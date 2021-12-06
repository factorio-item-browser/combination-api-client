<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Transfer;

use DateTimeImmutable;
use DateTimeInterface;
use JMS\Serializer\Annotation\Type;

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
     */
    public string $initiator = '';

    /**
     * The timestamp of when the change happened.
     */
    #[Type('DateTimeInterface<"Y-m-d\TH:i:sP">')]
    public DateTimeInterface $timestamp;

    /**
     * The new status of the job.
     */
    public string $status = '';

    public function __construct()
    {
        $this->timestamp = new DateTimeImmutable();
    }
}
