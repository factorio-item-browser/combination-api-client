<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Request\Job;

/**
 *
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class UpdateRequest
{
    /**
     * The id of the job.
     * @var string
     */
    public string $id = '';

    /**
     * The new status of the job.
     * @var string
     */
    public string $status = '';

    /**
     * The error message in case the export job failed.
     * @var string
     */
    public string $errorMessage = '';
}
