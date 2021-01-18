<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Endpoint\Combination;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\Combination\StatusEndpoint;
use FactorioItemBrowser\CombinationApi\Client\Request\Combination\StatusRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Combination\StatusResponse;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the StatusEndpoint class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \FactorioItemBrowser\CombinationApi\Client\Endpoint\Combination\StatusEndpoint
 */
class StatusEndpointTest extends TestCase
{
    public function test(): void
    {
        $request = new StatusRequest();

        $instance = new StatusEndpoint();

        $this->assertSame(StatusRequest::class, $instance->getHandledRequestClass());
        $this->assertSame('GET', $instance->getRequestMethod());
        $this->assertSame('status', $instance->getRequestPath($request));
        $this->assertSame(StatusResponse::class, $instance->getResponseClass());
    }
}
