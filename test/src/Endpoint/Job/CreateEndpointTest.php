<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Endpoint\Job;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\Job\CreateEndpoint;
use FactorioItemBrowser\CombinationApi\Client\Request\Job\CreateRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Job\DetailsResponse;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the CreateEndpoint class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Endpoint\Job\CreateEndpoint
 */
class CreateEndpointTest extends TestCase
{
    /**
     * @covers ::<public>
     */
    public function test(): void
    {
        $request = new CreateRequest();

        $instance = new CreateEndpoint();

        $this->assertSame(CreateRequest::class, $instance->getHandledRequestClass());
        $this->assertSame('POST', $instance->getRequestMethod());
        $this->assertSame('job', $instance->getRequestPath($request));
        $this->assertSame(DetailsResponse::class, $instance->getResponseClass());
    }
}
