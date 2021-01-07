<?php

/**
 * The configuration of the Combination API client.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client;

use BluePsyduck\JmsSerializerFactory\Constant\ConfigKey as JmsConfigKey;
use FactorioItemBrowser\CombinationApi\Client\Constant\ConfigKey;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;

return [
    ConfigKey::PROJECT => [
        ConfigKey::ENDPOINTS => [
            Endpoint\StatusEndpoint::class,
        ],
        ConfigKey::SERIALIZER => [
            JmsConfigKey::METADATA_DIRS => [
                __NAMESPACE__ => __DIR__ . '/serializer',
            ],
            JmsConfigKey::PROPERTY_NAMING_STRATEGY => IdenticalPropertyNamingStrategy::class,
        ],
    ],
];
