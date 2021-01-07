<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Constant;

/**
 * The interface holding the keys used for the config.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
interface ConfigKey
{
    public const PROJECT = 'combination-api-client';
    public const BASE_URI = 'base-uri';
    public const ENDPOINTS = 'endpoints';
    public const SERIALIZER = 'serializer';
    public const TIMEOUT = 'timeout';
}
