<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Request\Job;

use FactorioItemBrowser\CombinationApi\Client\Constant\JobPriority;

/**
 * The request for creating a new export job.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class CreateRequest
{
    /**
     * The id of the combination to create the export job for.
     * @var string
     */
    public string $combinationId = '';

    /**
     * The priority of the export job.
     * @var string
     */
    public string $priority = JobPriority::USER;
}
