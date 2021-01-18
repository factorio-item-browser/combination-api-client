<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Exception;

use Exception;
use FactorioItemBrowser\CombinationApi\Client\Exception\ErrorResponseException;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the ErrorResponseException class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \FactorioItemBrowser\CombinationApi\Client\Exception\ErrorResponseException
 */
class ErrorResponseExceptionTest extends TestCase
{
    public function testConstruct(): void
    {
        $statusCode = 42;
        $message = 'abc';
        $request = 'def';
        $response = 'ghi';
        $previous = $this->createMock(Exception::class);
        $expectedMessage = 'The request returned a status code 42: abc';

        $exception = new ErrorResponseException($message, $statusCode, $request, $response, $previous);

        $this->assertSame($expectedMessage, $exception->getMessage());
        $this->assertSame($statusCode, $exception->getCode());
        $this->assertSame($request, $exception->getRequest());
        $this->assertSame($response, $exception->getResponse());
        $this->assertSame($previous, $exception->getPrevious());
    }
}
