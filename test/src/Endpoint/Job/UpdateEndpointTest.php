<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Endpoint\Job;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\Job\UpdateEndpoint;
use FactorioItemBrowser\CombinationApi\Client\Request\Job\UpdateRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Job\DetailsResponse;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the UpdateEndpoint class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \FactorioItemBrowser\CombinationApi\Client\Endpoint\Job\UpdateEndpoint
 */
class UpdateEndpointTest extends TestCase
{
    public function test(): void
    {
        $request = new UpdateRequest();
        $request->id = 'abc';

        $instance = new UpdateEndpoint();

        $this->assertSame(UpdateRequest::class, $instance->getHandledRequestClass());
        $this->assertSame('PATCH', $instance->getRequestMethod());
        $this->assertSame('job/abc', $instance->getRequestPath($request));
        $this->assertSame(DetailsResponse::class, $instance->getResponseClass());
    }
}
