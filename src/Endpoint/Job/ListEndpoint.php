<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Endpoint\Job;

use FactorioItemBrowser\CombinationApi\Client\Constant\ParameterName;
use FactorioItemBrowser\CombinationApi\Client\Endpoint\EndpointInterface;
use FactorioItemBrowser\CombinationApi\Client\Request\Job\ListRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Job\ListResponse;

/**
 * The endpoint for the job list request.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 *
 * @implements EndpointInterface<ListRequest, ListResponse>
 */
class ListEndpoint implements EndpointInterface
{
    public function getHandledRequestClass(): string
    {
        return ListRequest::class;
    }

    public function getRequestMethod(): string
    {
        return 'GET';
    }

    /**
     * @param ListRequest $request
     * @return string
     */
    public function getRequestPath(object $request): string
    {
        return rtrim(sprintf('jobs?%s', http_build_query(array_filter([
            ParameterName::COMBINATION_ID => $request->combinationId,
            ParameterName::STATUS => $request->status,
            ParameterName::ORDER => $request->order,
            ParameterName::LIMIT => $request->limit,
        ]))), '?');
    }

    public function getResponseClass(): string
    {
        return ListResponse::class;
    }
}
