<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Transfer;

use DateTimeImmutable;
use DateTimeInterface;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

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
     */
    public string $id = '';

    /**
     * The id of the combination assigned to the job.
     */
    public string $combinationId = '';

    /**
     * The priority of the export job.
     */
    public string $priority = '';

    /**
     * The current status of the job.
     */
    public string $status = '';

    /**
     * The current position of the job in the queue.
     */
    public int $queuePosition = 0;

    /**
     * The error message in case the job failed.
     */
    public string $errorMessage = '';

    /**
     * The creation time of the export job.
     */
    #[Type('DateTimeInterface<"Y-m-d\TH:i:sP">')]
    public DateTimeInterface $creationTime;

    /**
     * The changes of the job.
     * @var array<JobChange>
     */
    #[Type('array<' . JobChange::class . '>')]
    public array $changes = [];

    public function __construct()
    {
        $this->creationTime = new DateTimeImmutable();
    }
}
