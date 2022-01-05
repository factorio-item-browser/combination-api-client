<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Transfer;

use JMS\Serializer\Annotation\Type;

/**
 * The class representing a validated mod.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ValidatedMod
{
    /**
     * The name of the mod.
     */
    public string $name = '';

    /**
     * The version of the mod used for validation.
     */
    public string $version = '';

    /**
     * The problems encountered with the mod.
     * @var array<ValidationProblem>
     */
    #[Type('array<' . ValidationProblem::class . '>')]
    public array $problems = [];
}
