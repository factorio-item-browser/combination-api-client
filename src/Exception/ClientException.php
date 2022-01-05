<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Exception;

use Exception;
use Throwable;

/**
 * The base exception thrown by the client.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ClientException extends Exception
{
    private string $request;
    private string $response;

    public function __construct(
        string $message,
        int $code = 0,
        string $request = '',
        string $response = '',
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Returns the request which was tried to be executed.
     */
    public function getRequest(): string
    {
        return $this->request;
    }

    /**
     * Returns the response which has been received.
     */
    public function getResponse(): string
    {
        return $this->response;
    }
}
