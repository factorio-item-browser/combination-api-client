<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Constant;

/**
 * The interface holding the validation problem types.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
interface ValidationProblemType
{
    /**
     * The mod is not known to the Factorio mod portal.
     */
    public const UNKNOWN_MOD = 'unknownMod';

    /**
     * No release could be found which is compatible to the current Factorio version.
     */
    public const NO_RELEASE = 'noRelease';

    /**
     * The mod is missing a mandatory dependency.
     */
    public const MISSING_DEPENDENCY = 'missingDependency';

    /**
     * The mod is in conflict with another mod.
     */
    public const CONFLICT = 'conflict';
}
