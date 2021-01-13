<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Constant;

/**
 * The interface holding the job priority values.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
interface JobPriority
{
    /**
     * The job has been triggered by an admin and has the highest priority.
     */
    public const ADMIN = 'admin';

    /**
     * The job has been (indirectly) been triggered by a user.
     */
    public const USER = 'user';

    /**
     * The job has been triggered through the automatic update feature and is considered to have the lowest priority.
     */
    public const AUTO_UPDATE = 'auto-update';
}
