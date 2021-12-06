<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Request\Job;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Type;

/**
 * The request for updating a job.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class UpdateRequest
{
    /**
     * The id of the job.
     */
    #[Exclude]
    public string $id = '';

    /**
     * The new status of the job.
     */
    public string $status = '';

    /**
     * The error message in case the export job failed.
     */
    public string $errorMessage = '';
}
