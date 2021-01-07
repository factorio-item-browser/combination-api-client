<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Transfer;

use FactorioItemBrowser\CombinationApi\Client\Constant\JobStatus;

/**
 * The class representing an export job.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class Job
{
    /**
     * The id of the job.
     * @var string
     */
    public string $id = '';

    /**
     * The id of the combination assigned to the job.
     * @var string
     */
    public string $combinationId = '';

    /**
     * The current status of the job.
     * @var string
     */
    public string $status = JobStatus::QUEUED;

    /**
     * The error message in case the job failed.
     * @var string
     */
    public string $errorMessage = '';

    /**
     * The changes of the job.
     * @var array<JobChange>
     */
    public array $changes = [];
}
