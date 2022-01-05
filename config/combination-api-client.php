<?php

/**
 * The configuration of the Combination API client.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
// phpcs:ignoreFile

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client;

use BluePsyduck\JmsSerializerFactory\Constant\ConfigKey as JmsConfigKey;
use FactorioItemBrowser\CombinationApi\Client\Constant\ConfigKey;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;

return [
    ConfigKey::MAIN => [
        ConfigKey::ENDPOINTS => [
            Endpoint\Combination\StatusEndpoint::class,
            Endpoint\Combination\ValidateEndpoint::class,
            Endpoint\Job\CreateEndpoint::class,
            Endpoint\Job\DetailsEndpoint::class,
            Endpoint\Job\ListEndpoint::class,
            Endpoint\Job\UpdateEndpoint::class,
        ],
        ConfigKey::SERIALIZER => [
            JmsConfigKey::PROPERTY_NAMING_STRATEGY => IdenticalPropertyNamingStrategy::class,
        ],
    ],
];
