<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Constant;

/**
 * The interface holding the values for the list order.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
interface ListOrder
{
    /**
     * The jobs are sorted by their creation time, oldest first.
     */
    public const CREATION = 'creation';

    /**
     * The jobs are sorted by latest job first.
     */
    public const LATEST = 'latest';

    /**
     * The jobs are sorted by their priority for the export.
     */
    public const PRIORITY = 'priority';
}
