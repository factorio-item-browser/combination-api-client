<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client;

use FactorioItemBrowser\CombinationApi\Client\Exception\ClientException;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * The interface of the client.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
interface ClientInterface
{
    /**
     * Sends the request to the server.
     * @param object $request
     * @return PromiseInterface
     * @throws ClientException
     */
    public function sendRequest(object $request): PromiseInterface;
}
