<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Transfer;

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
     * @var string
     */
    public string $type = '';

    /**
     * The dependency which lead to the problem, if any.
     * @var string
     */
    public string $dependency = '';
}
