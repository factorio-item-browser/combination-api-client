<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Endpoint\Combination;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\Combination\ValidateEndpoint;
use FactorioItemBrowser\CombinationApi\Client\Request\Combination\ValidateRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Combination\ValidateResponse;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the ValidateEndpoint class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \FactorioItemBrowser\CombinationApi\Client\Endpoint\Combination\ValidateEndpoint
 */
class ValidateEndpointTest extends TestCase
{
    public function test(): void
    {
        $request = new ValidateRequest();
        $request->factorioVersion = '1.2.3';

        $instance = new ValidateEndpoint();

        $this->assertSame(ValidateRequest::class, $instance->getHandledRequestClass());
        $this->assertSame('POST', $instance->getRequestMethod());
        $this->assertSame('validate/1.2.3', $instance->getRequestPath($request));
        $this->assertSame(ValidateResponse::class, $instance->getResponseClass());
    }
}
