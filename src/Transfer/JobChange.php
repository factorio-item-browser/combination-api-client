<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Transfer;

use DateTimeImmutable;
use DateTimeInterface;
use FactorioItemBrowser\CombinationApi\Client\Constant\JobStatus;

/**
 * The class representing a change of a job.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class JobChange
{
    /**
     * The initiator of the change.
     * @var string
     */
    public string $initiator = '';

    /**
     * The timestamp of when the change happened.
     * @var DateTimeInterface
     */
    public DateTimeInterface $timestamp;

    /**
     * The new status of the job.
     * @var string
     */
    public string $status = JobStatus::QUEUED;

    public function __construct()
    {
        $this->timestamp = new DateTimeImmutable();
    }
}
