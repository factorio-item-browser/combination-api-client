<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Request\Job;

use FactorioItemBrowser\CombinationApi\Client\Constant\JobPriority;
use JMS\Serializer\Annotation\Type;

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
     */
    public string $combinationId = '';

    /**
     * The priority of the export job.
     */
    public string $priority = JobPriority::USER;
}
