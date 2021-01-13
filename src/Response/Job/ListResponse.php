<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Response\Job;

use FactorioItemBrowser\CombinationApi\Client\Transfer\Job;

/**
 * The response containing a list of jobs.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ListResponse
{
    /**
     * The jobs matching the criteria.
     * @var array<Job>
     */
    public array $jobs = [];
}
