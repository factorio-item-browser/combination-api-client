<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Endpoint;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\ValidateEndpoint;
use FactorioItemBrowser\CombinationApi\Client\Request\ValidateRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\ValidateResponse;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the ValidateEndpoint class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Endpoint\ValidateEndpoint
 */
class ValidateEndpointTest extends TestCase
{
    /**
     * @covers ::<public>
     */
    public function test(): void
    {
        $request = new ValidateRequest();

        $instance = new ValidateEndpoint();

        $this->assertSame(ValidateRequest::class, $instance->getHandledRequestClass());
        $this->assertSame('POST', $instance->getRequestMethod());
        $this->assertSame('validate', $instance->getRequestPath($request));
        $this->assertSame(ValidateResponse::class, $instance->getResponseClass());
    }
}
