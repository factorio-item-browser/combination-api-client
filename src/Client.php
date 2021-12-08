<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client;

use BluePsyduck\LaminasAutoWireFactory\Attribute\Alias;
use BluePsyduck\LaminasAutoWireFactory\Attribute\InjectAliasArray;
use Exception;
use FactorioItemBrowser\CombinationApi\Client\Constant\ConfigKey;
use FactorioItemBrowser\CombinationApi\Client\Constant\ServiceName;
use FactorioItemBrowser\CombinationApi\Client\Endpoint\EndpointInterface;
use FactorioItemBrowser\CombinationApi\Client\Endpoint\RequestHeadersProviderInterface;
use FactorioItemBrowser\CombinationApi\Client\Exception\ClientException;
use FactorioItemBrowser\CombinationApi\Client\Exception\ConnectionException;
use FactorioItemBrowser\CombinationApi\Client\Exception\ErrorResponseException;
use FactorioItemBrowser\CombinationApi\Client\Exception\InvalidResponseException;
use FactorioItemBrowser\CombinationApi\Client\Exception\UnhandledRequestException;
use FactorioItemBrowser\CombinationApi\Client\Response\EmptyResponse;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * The actual client class sending the request to the server and parsing the response.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class Client implements ClientInterface
{
    /** @var array<string, EndpointInterface<object, object>> */
    private readonly array $endpoints;

    /**
     * @param GuzzleClientInterface $guzzleClient
     * @param SerializerInterface $serializer
     * @param array<EndpointInterface<object, object>> $endpoints
     */
    public function __construct(
        #[Alias(ServiceName::GUZZLE_CLIENT)]
        private readonly GuzzleClientInterface $guzzleClient,
        #[Alias(ServiceName::SERIALIZER)]
        private readonly SerializerInterface $serializer,
        #[InjectAliasArray(ConfigKey::MAIN, ConfigKey::ENDPOINTS)]
        array $endpoints
    ) {
        foreach ($endpoints as $endpoint) {
            $this->endpoints[$endpoint->getHandledRequestClass()] = $endpoint;
        }
    }

    public function sendRequest(object $request): PromiseInterface
    {
        $endpoint = $this->endpoints[get_class($request)] ?? null;
        if ($endpoint === null) {
            throw new UnhandledRequestException(get_class($request));
        }

        $clientRequest = $this->createClientRequest($endpoint, $request);
        return $this->guzzleClient->sendAsync($clientRequest)->then(
            function (ResponseInterface $clientResponse) use ($endpoint, $clientRequest) {
                return $this->handleClientResponse($endpoint, $clientRequest, $clientResponse);
            },
            function (TransferException $e): void {
                $this->handleException($e);
            },
        );
    }

    /**
     * Creates the client request.
     * @param EndpointInterface<object, object> $endpoint
     * @param object $request
     * @return RequestInterface
     */
    private function createClientRequest(EndpointInterface $endpoint, object $request): RequestInterface
    {
        $requestBody = $this->serializer->serialize($request, 'json');
        if ($requestBody === '{}') {
            $requestBody = null;
        }

        $headers = [
            'Accept' => 'application/json',
        ];
        if ($requestBody !== null) {
            $headers['Content-Type'] = 'application/json';
        }
        if ($endpoint instanceof RequestHeadersProviderInterface) {
            $headers = array_merge($headers, $endpoint->getRequestHeaders($request));
        }

        return new Request($endpoint->getRequestMethod(), $endpoint->getRequestPath($request), $headers, $requestBody);
    }

    /**
     * Handles the response received from the client, transforming it to the response object.
     * @param EndpointInterface<object, object> $endpoint
     * @param RequestInterface $clientRequest
     * @param ResponseInterface $clientResponse
     * @return object
     * @throws InvalidResponseException
     */
    private function handleClientResponse(
        EndpointInterface $endpoint,
        RequestInterface $clientRequest,
        ResponseInterface $clientResponse
    ): object {
        $responseClass = $endpoint->getResponseClass();
        if ($responseClass === EmptyResponse::class) {
            return new EmptyResponse();
        }

        try {
            // @phpstan-ignore-next-line
            return $this->serializer->deserialize($clientResponse->getBody()->getContents(), $responseClass, 'json');
        } catch (Exception $e) {
            throw new InvalidResponseException(
                $e->getMessage(),
                $clientRequest->getBody()->getContents(),
                $clientResponse->getBody()->getContents(),
                $e,
            );
        }
    }

    /**
     * Handles the exception throws by the client, transforming it into a ClientException.
     * @param TransferException $exception
     * @throws ClientException
     */
    private function handleException(TransferException $exception): void
    {
        if ($exception instanceof ConnectException) {
            throw new ConnectionException(
                $exception->getMessage(),
                $exception->getRequest()->getBody()->getContents(),
                $exception,
            );
        }

        $requestContent = '';
        $responseContent = '';
        $exceptionMessage = $exception->getMessage();
        if ($exception instanceof RequestException) {
            $requestContent = $exception->getRequest()->getBody()->getContents();

            $response = $exception->getResponse();
            if ($response !== null) {
                $responseContent = $response->getBody()->getContents();
                $exceptionMessage = $this->extractErrorMessage($responseContent, $exception);
            }
        }

        throw new ErrorResponseException(
            $exceptionMessage,
            intval($exception->getCode()),
            $requestContent,
            $responseContent,
            $exception,
        );
    }

    /**
     * Tries to extract the error message from the response, and falls back to the exception message otherwise.
     * @param string $responseContent
     * @param Exception $exception
     * @return string
     */
    private function extractErrorMessage(string $responseContent, Exception $exception): string
    {
        try {
            $data = json_decode($responseContent, true, 512, JSON_THROW_ON_ERROR);
            return $data['error']['message'] ?? $exception->getMessage(); // @phpstan-ignore-line
        } catch (Exception $e) {
            return $exception->getMessage();
        }
    }
}
