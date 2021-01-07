<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client;

use Exception;
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
    private SerializerInterface $serializer;
    private GuzzleClientInterface $guzzleClient;

    /** @var array<string, EndpointInterface<object, object>> */
    private array $endpoints = [];

    /**
     * @param GuzzleClientInterface $guzzleClient
     * @param SerializerInterface $serializer
     * @param array<EndpointInterface<object, object>> $endpoints
     */
    public function __construct(
        GuzzleClientInterface $guzzleClient,
        SerializerInterface $serializer,
        array $endpoints
    ) {
        $this->guzzleClient = $guzzleClient;
        $this->serializer = $serializer;

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
            function (RequestException $e): void {
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
     * @param RequestException $exception
     * @throws ClientException
     */
    private function handleException(RequestException $exception): void
    {
        if ($exception instanceof ConnectException) {
            throw new ConnectionException(
                $exception->getMessage(),
                $exception->getRequest()->getBody()->getContents(),
                $exception,
            );
        }

        $response = $exception->getResponse();
        if ($response === null) {
            throw new ErrorResponseException(
                $exception->getMessage(),
                0,
                $exception->getRequest()->getBody()->getContents(),
                '',
                $exception,
            );
        }

        throw new ErrorResponseException(
            $this->extractErrorMessage($response, $exception),
            $response->getStatusCode(),
            $exception->getRequest()->getBody()->getContents(),
            $response->getBody()->getContents(),
            $exception,
        );
    }

    /**
     * Tries to extract the error message from the response, and falls back to the exception message otherwise.
     * @param ResponseInterface $response
     * @param Exception $exception
     * @return string
     */
    private function extractErrorMessage(ResponseInterface $response, Exception $exception): string
    {
        try {
            $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
            return $data['message'] ?? $exception->getMessage();
        } catch (Exception $e) {
            return $exception->getMessage();
        }
    }
}
