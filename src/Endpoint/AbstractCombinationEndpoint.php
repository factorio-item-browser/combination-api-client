<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Endpoint;

use FactorioItemBrowser\CombinationApi\Client\Request\AbstractCombinationRequest;

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
                'Combination-Id' => $request->combinationId,
            ];
        }

        if ($request->shortCombinationId !== '') {
            return [
                'Short-Combination-Id' => $request->shortCombinationId,
            ];
        }

        if (count($request->modNames) > 0) {
            return [
                'Mod-Names' => implode(',', $request->modNames),
            ];
        }

        return [];
    }
}
