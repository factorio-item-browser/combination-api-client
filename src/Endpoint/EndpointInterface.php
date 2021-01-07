<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Endpoint;

/**
 * The interface for the endpoints.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 *
 * @template TRequest of object
 * @template TResponse of object
 */
interface EndpointInterface
{
    /**
     * Returns the request class handled by the endpoint.
     * @return class-string<TRequest>
     */
    public function getHandledRequestClass(): string;

    /**
     * Returns the request method for the request.
     * @return string
     */
    public function getRequestMethod(): string;

    /**
     * Returns the path to use for the request, including the query parameters.
     * @param TRequest $request
     * @return string
     */
    public function getRequestPath(object $request): string;

    /**
     * Returns the response class.
     * @return class-string<TResponse>
     */
    public function getResponseClass(): string;
}
