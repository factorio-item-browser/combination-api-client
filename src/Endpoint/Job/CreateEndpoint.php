<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Endpoint\Job;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\EndpointInterface;
use FactorioItemBrowser\CombinationApi\Client\Request\Job\CreateRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Job\DetailsResponse;

/**
 * The endpoint for the job create request.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 *
 * @implements EndpointInterface<CreateRequest, DetailsResponse>
 */
class CreateEndpoint implements EndpointInterface
{
    public function getHandledRequestClass(): string
    {
        return CreateRequest::class;
    }

    public function getRequestMethod(): string
    {
        return 'POST';
    }

    public function getRequestPath(object $request): string
    {
        return 'job';
    }

    public function getResponseClass(): string
    {
        return DetailsResponse::class;
    }
}
