<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestAsset\CombinationApi\Client;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\EndpointInterface;
use FactorioItemBrowser\CombinationApi\Client\Endpoint\RequestHeadersProviderInterface;
use FactorioItemBrowser\CombinationApi\Client\Response\EmptyResponse;

/**
 * A endpoint implementation for testing.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 *
 * @implements EndpointInterface<TestRequest, TestResponse|EmptyResponse>
 * @implements HeadersProviderInterface<TestRequest>
 */
class TestEndpoint implements EndpointInterface, RequestHeadersProviderInterface
{
    public bool $withEmptyResponse = false;

    public function getHandledRequestClass(): string
    {
        return TestRequest::class;
    }

    public function getRequestMethod(): string
    {
        return 'TEST';
    }

    public function getRequestPath(object $request): string
    {
        return 'test';
    }

    public function getResponseClass(): string
    {
        return $this->withEmptyResponse ? EmptyResponse::class : TestResponse::class;
    }

    public function getRequestHeaders(object $request): array
    {
        return [
            'Foo' => 'bar',
        ];
    }
}
