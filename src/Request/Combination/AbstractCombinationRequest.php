<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Request\Combination;

use JMS\Serializer\Annotation\Exclude;

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
     */
    #[Exclude]
    public string $combinationId = '';

    /**
     * The short ID of the combination.
     */
    #[Exclude]
    public string $shortCombinationId = '';

    /**
     * The names of the mods building the combination.
     * @var array<string>
     */
    #[Exclude]
    public array $modNames = [];
}
