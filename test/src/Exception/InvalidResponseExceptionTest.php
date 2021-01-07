<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Exception;

use Exception;
use FactorioItemBrowser\CombinationApi\Client\Exception\InvalidResponseException;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the InvalidResponseException class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Exception\InvalidResponseException
 */
class InvalidResponseExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $message = 'abc';
        $request = 'def';
        $response = 'ghi';
        $previous = $this->createMock(Exception::class);
        $expectedMessage = 'The response could not be parsed: abc';

        $exception = new InvalidResponseException($message, $request, $response, $previous);

        $this->assertSame($expectedMessage, $exception->getMessage());
        $this->assertSame(500, $exception->getCode());
        $this->assertSame($request, $exception->getRequest());
        $this->assertSame($response, $exception->getResponse());
        $this->assertSame($previous, $exception->getPrevious());
    }
}
