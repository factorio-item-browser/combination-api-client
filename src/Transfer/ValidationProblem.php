<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Transfer;

use JMS\Serializer\Annotation\Type;

/**
 * The class representing a problem encountered during validation.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ValidationProblem
{
    /**
     * The type of the problem encountered during validation.
     */
    public string $type = '';

    /**
     * The dependency which lead to the problem, if any.
     */
    public string $dependency = '';
}
