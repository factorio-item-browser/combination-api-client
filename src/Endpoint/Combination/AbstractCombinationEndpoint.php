<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Endpoint\Combination;

use FactorioItemBrowser\CombinationApi\Client\Constant\HeaderName;
use FactorioItemBrowser\CombinationApi\Client\Endpoint\EndpointInterface;
use FactorioItemBrowser\CombinationApi\Client\Endpoint\RequestHeadersProviderInterface;
use FactorioItemBrowser\CombinationApi\Client\Request\Combination\AbstractCombinationRequest;

/**
 * The abstract layer of the combination-referencing endpoints.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 *
 * @template TRequest of AbstractCombinationRequest
 * @template TResponse of object
 * @implements EndpointInterface<TRequest, TResponse>
 * @implements RequestHeadersProviderInterface<TRequest>
 */
abstract class AbstractCombinationEndpoint implements EndpointInterface, RequestHeadersProviderInterface
{
    /**
     * @param AbstractCombinationRequest $request
     * @return array<string, string>
     */
    public function getRequestHeaders(object $request): array
    {
        if ($request->combinationId !== '') {
            return [
                HeaderName::COMBINATION_ID => $request->combinationId,
            ];
        }

        if ($request->shortCombinationId !== '') {
            return [
                HeaderName::SHORT_COMBINATION_ID => $request->shortCombinationId,
            ];
        }

        if (count($request->modNames) > 0) {
            return [
                HeaderName::MOD_NAMES => implode(',', $request->modNames),
            ];
        }

        return [];
    }
}
