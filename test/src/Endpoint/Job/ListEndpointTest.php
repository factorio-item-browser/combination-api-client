<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Endpoint\Job;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\Job\ListEndpoint;
use FactorioItemBrowser\CombinationApi\Client\Request\Job\ListRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Job\ListResponse;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the ListEndpoint class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Endpoint\Job\ListEndpoint
 */
class ListEndpointTest extends TestCase
{
    /**
     * @covers ::<public>
     */
    public function test(): void
    {
        $request = new ListRequest();
        $request->status = 'abc';

        $instance = new ListEndpoint();

        $this->assertSame(ListRequest::class, $instance->getHandledRequestClass());
        $this->assertSame('GET', $instance->getRequestMethod());
        $this->assertSame('jobs?status=abc', $instance->getRequestPath($request));
        $this->assertSame(ListResponse::class, $instance->getResponseClass());
    }

    /**
     * @return array<mixed>
     */
    public function provideGetRequestPath(): array
    {
        $request1 = new ListRequest();
        $request1->combinationId = 'abc';
        $request1->status = 'def';
        $request1->order = 'ghi';
        $request1->limit = 42;

        $request2 = new ListRequest();

        return [
            [$request1, 'jobs?combinationId=abc&status=def&order=ghi&limit=42'],
            [$request2, 'jobs'],
        ];
    }

    /**
     * @param ListRequest $request
     * @param string $expectedPath
     * @covers ::getRequestPath
     * @dataProvider provideGetRequestPath
     */
    public function testGetRequestPath(ListRequest $request, string $expectedPath): void
    {
        $instance = new ListEndpoint();

        $this->assertSame($expectedPath, $instance->getRequestPath($request));
    }
}
