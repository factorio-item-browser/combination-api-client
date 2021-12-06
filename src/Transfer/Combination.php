<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Transfer;

use DateTimeInterface;
use JMS\Serializer\Annotation\Type;

/**
 * The class representing a combination.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class Combination
{
    /**
     * The ID of the combination.
     */
    public string $id = '';

    /**
     * The short ID of the combination.
     */
    public string $shortId = '';

    /**
     * The names of the mods building the combination.
     * @var array<string>
     */
    #[Type('array<string>')]
    public array $modNames = [];

    /**
     * Whether the data of this combination is available in the Data API.
     */
    public bool $isDataAvailable = false;

    /**
     * The time when the combination was last exported.
     */
    #[Type('DateTimeInterface<"Y-m-d\TH:i:sP">')]
    public ?DateTimeInterface $exportTime = null;
}
