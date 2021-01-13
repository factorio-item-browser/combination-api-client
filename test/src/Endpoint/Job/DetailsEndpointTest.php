<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Endpoint\Job;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\Job\DetailsEndpoint;
use FactorioItemBrowser\CombinationApi\Client\Request\Job\DetailsRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Job\DetailsResponse;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the DetailsEndpoint class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Endpoint\Job\DetailsEndpoint
 */
class DetailsEndpointTest extends TestCase
{
    /**
     * @covers ::<public>
     */
    public function test(): void
    {
        $request = new DetailsRequest();
        $request->id = 'abc';

        $instance = new DetailsEndpoint();

        $this->assertSame(DetailsRequest::class, $instance->getHandledRequestClass());
        $this->assertSame('GET', $instance->getRequestMethod());
        $this->assertSame('job/abc', $instance->getRequestPath($request));
        $this->assertSame(DetailsResponse::class, $instance->getResponseClass());
    }
}
