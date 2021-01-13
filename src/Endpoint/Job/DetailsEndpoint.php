<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Endpoint\Job;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\EndpointInterface;
use FactorioItemBrowser\CombinationApi\Client\Request\Job\DetailsRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Job\DetailsResponse;

/**
 * The endpoint of the job details request
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 *
 * @implements EndpointInterface<DetailsRequest, DetailsResponse>
 */
class DetailsEndpoint implements EndpointInterface
{
    public function getHandledRequestClass(): string
    {
        return DetailsRequest::class;
    }

    public function getRequestMethod(): string
    {
        return 'GET';
    }

    /**
     * @param DetailsRequest $request
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
