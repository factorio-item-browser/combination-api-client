<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Response;

use FactorioItemBrowser\CombinationApi\Client\Transfer\ValidatedMod;

/**
 * The response containing the validation result.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ValidateResponse
{
    /**
     * Whether the combination is valid.
     * @var bool
     */
    public bool $isValid = false;

    /**
     * The mods which have been validated.
     * @var array<ValidatedMod>
     */
    public array $mods = [];
}
