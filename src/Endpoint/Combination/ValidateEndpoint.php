<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Endpoint\Combination;

use FactorioItemBrowser\CombinationApi\Client\Request\Combination\ValidateRequest;
use FactorioItemBrowser\CombinationApi\Client\Response\Combination\ValidateResponse;

/**
 * The endpoint for validating a combination.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 *
 * @extends AbstractCombinationEndpoint<ValidateRequest, ValidateResponse>
 */
class ValidateEndpoint extends AbstractCombinationEndpoint
{
    public function getHandledRequestClass(): string
    {
        return ValidateRequest::class;
    }

    public function getRequestMethod(): string
    {
        return 'POST';
    }

    public function getRequestPath(object $request): string
    {
        return 'validate';
    }

    public function getResponseClass(): string
    {
        return ValidateResponse::class;
    }
}
