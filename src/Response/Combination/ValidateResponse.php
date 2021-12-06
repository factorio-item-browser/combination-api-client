<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Response\Combination;

use FactorioItemBrowser\CombinationApi\Client\Transfer\ValidatedMod;
use JMS\Serializer\Annotation\Type;

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
     */
    public bool $isValid = false;

    /**
     * The mods which have been validated.
     * @var array<ValidatedMod>
     */
    #[Type('array<' . ValidatedMod::class . '>')]
    public array $mods = [];
}
