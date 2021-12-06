<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Request\Job;

use JMS\Serializer\Annotation\Exclude;

/**
 * The request for returning the details of an export job.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class DetailsRequest
{
    /**
     * The id of the job.
     */
    #[Exclude]
    public string $id = '';
}
