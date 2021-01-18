<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Transfer;

use DateTimeImmutable;
use DateTimeInterface;

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
     * The priority of the export job.
     * @var string
     */
    public string $priority = '';

    /**
     * The current status of the job.
     * @var string
     */
    public string $status = '';

    /**
     * The current position of the job in the queue.
     * @var int
     */
    public int $queuePosition = 0;

    /**
     * The error message in case the job failed.
     * @var string
     */
    public string $errorMessage = '';

    /**
     * The creation time of the export job.
     * @var DateTimeInterface
     */
    public DateTimeInterface $creationTime;

    /**
     * The changes of the job.
     * @var array<JobChange>
     */
    public array $changes = [];

    public function __construct()
    {
        $this->creationTime = new DateTimeImmutable();
    }
}
