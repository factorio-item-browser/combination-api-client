<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Request\Job;

/**
 * The request for returning a list of export jobs.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ListRequest
{
    /**
     * The id of the combination to return the jobs from.
     * @var string
     */
    public string $combinationId = '';

    /**
     * The status of the jobs to return.
     * @var string
     */
    public string $status = '';

    /**
     * The order in which to return the jobs.
     * @var string
     */
    public string $order = '';

    /**
     * The maximal number of jobs to return.
     * @var int
     */
    public int $limit = 0;
}
