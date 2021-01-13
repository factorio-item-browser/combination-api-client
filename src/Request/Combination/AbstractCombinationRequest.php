<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Request\Combination;

/**
 * The abstract layer of the combination-referencing requests.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
abstract class AbstractCombinationRequest
{
    /**
     * The ID of the combination.
     * @var string
     */
    public string $combinationId = '';

    /**
     * The short ID of the combination.
     * @var string
     */
    public string $shortCombinationId = '';

    /**
     * The names of the mods building the combination.
     * @var array<string>
     */
    public array $modNames = [];
}
