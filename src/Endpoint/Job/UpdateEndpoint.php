<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Endpoint\Job;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\EndpointInterface;
use FactorioItemBrowser\CombinationApi\Client\Request\Job\UpdateRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Job\DetailsResponse;

/**
 * The endpoint for the job update request.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 *
 * @implements EndpointInterface<UpdateRequest, DetailsResponse>
 */
class UpdateEndpoint implements EndpointInterface
{
    public function getHandledRequestClass(): string
    {
        return UpdateRequest::class;
    }

    public function getRequestMethod(): string
    {
        return 'PATCH';
    }

    /**
     * @param UpdateRequest $request
     * @return string
     */
    public function getRequestPath(object $request): string
    {
        return sprintf('job/%s', $request->id);
    }

    public function getResponseClass(): string
    {
        return DetailsResponse::class;
    }
}
