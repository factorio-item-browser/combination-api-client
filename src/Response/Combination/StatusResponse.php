<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Response\Combination;

/**
 * The response containing the status of a combination.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class StatusResponse
{
    /**
     * The ID of the combination.
     * @var string
     */
    public string $id = '';

    /**
     * The short ID of the combination.
     * @var string
     */
    public string $shortId = '';

    /**
     * The names of the mods building the combination.
     * @var array<string>
     */
    public array $modNames = [];

    /**
     * Whether the data of this combination is available in the Data API.
     * @var bool
     */
    public bool $isDataAvailable = false;
}