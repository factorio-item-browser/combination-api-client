<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Exception;

use Exception;
use FactorioItemBrowser\CombinationApi\Client\Exception\UnhandledRequestException;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the UnhandledRequestException class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \FactorioItemBrowser\CombinationApi\Client\Exception\UnhandledRequestException
 */
class UnhandledRequestExceptionTest extends TestCase
{
    public function testConstruct(): void
    {
        $requestClass = 'abc';
        $previous = $this->createMock(Exception::class);
        $expectedMessage = 'The request abc is not handled by any endpoint.';

        $exception = new UnhandledRequestException($requestClass, $previous);

        $this->assertSame($expectedMessage, $exception->getMessage());
        $this->assertSame(0, $exception->getCode());
        $this->assertSame('', $exception->getRequest());
        $this->assertSame('', $exception->getResponse());
        $this->assertSame($previous, $exception->getPrevious());
    }
}
