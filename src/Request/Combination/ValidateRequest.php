<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Request\Combination;

use JMS\Serializer\Annotation\Exclude;

/**
 * The request for validating a combination.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ValidateRequest extends AbstractCombinationRequest
{
    /**
     * The version of Factorio to validate the combination against.
     */
    #[Exclude]
    public string $factorioVersion = '1.0.0';
}
