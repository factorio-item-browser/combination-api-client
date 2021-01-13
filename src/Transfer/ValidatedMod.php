<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Transfer;

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
     * @var string
     */
    public string $name = '';

    /**
     * The version of the mod used for validation.
     * @var string
     */
    public string $version = '';

    /**
     * The problems encountered with the mod.
     * @var array<ValidationProblem>
     */
    public array $problems = [];
}
