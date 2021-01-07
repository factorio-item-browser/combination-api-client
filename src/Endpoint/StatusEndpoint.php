<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Endpoint;

use FactorioItemBrowser\CombinationApi\Client\Request\StatusRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\StatusResponse;

/**
 * The endpoint for requesting the status of a combination.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 *
 * @extends AbstractCombinationEndpoint<StatusRequest, StatusResponse>
 */
class StatusEndpoint extends AbstractCombinationEndpoint
{
    public function getHandledRequestClass(): string
    {
        return StatusRequest::class;
    }

    public function getRequestMethod(): string
    {
        return 'GET';
    }

    public function getRequestPath(object $request): string
    {
        return 'status';
    }

    public function getResponseClass(): string
    {
        return StatusResponse::class;
    }
}
