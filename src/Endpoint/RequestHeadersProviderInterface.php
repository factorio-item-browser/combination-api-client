<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Endpoint;

/**
 * The interface signaling that the endpoint provides additional request headers.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 *
 * @template TRequest of object
 */
interface RequestHeadersProviderInterface
{
    /**
     * Returns the headers to use for the request.
     * @param TRequest $request
     * @return array<string, string>
     */
    public function getRequestHeaders(object $request): array;
}
