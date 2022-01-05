<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Request\Job;

use JMS\Serializer\Annotation\Exclude;

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
     */
    #[Exclude]
    public string $combinationId = '';

    /**
     * The status of the jobs to return.
     */
    #[Exclude]
    public string $status = '';

    /**
     * The order in which to return the jobs.
     */
    #[Exclude]
    public string $order = '';

    /**
     * The maximal number of jobs to return.
     */
    #[Exclude]
    public int $limit = 0;

    /**
     * The first job to return.
     */
    #[Exclude]
    public int $first = 0;
}
