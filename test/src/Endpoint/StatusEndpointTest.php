<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Endpoint;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\StatusEndpoint;
use FactorioItemBrowser\CombinationApi\Client\Request\StatusRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\StatusResponse;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the StatusEndpoint class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Endpoint\StatusEndpoint
 */
class StatusEndpointTest extends TestCase
{
    /**
     * @covers ::<public>
     */
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
