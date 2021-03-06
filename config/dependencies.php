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

use BluePsyduck\JmsSerializerFactory\JmsSerializerFactory;
use BluePsyduck\LaminasAutoWireFactory\AutoWireFactory;
use FactorioItemBrowser\CombinationApi\Client\Constant\ConfigKey;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerInterface;

return [
    'dependencies' => [
        'factories' => [
            ClientInterface::class => ClientFactory::class,

            Endpoint\Combination\StatusEndpoint::class => AutoWireFactory::class,
            Endpoint\Combination\ValidateEndpoint::class => AutoWireFactory::class,
            Endpoint\Job\CreateEndpoint::class => AutoWireFactory::class,
            Endpoint\Job\DetailsEndpoint::class => AutoWireFactory::class,
            Endpoint\Job\ListEndpoint::class => AutoWireFactory::class,
            Endpoint\Job\UpdateEndpoint::class => AutoWireFactory::class,

            // 3rd-party dependencies
            IdenticalPropertyNamingStrategy::class => AutoWireFactory::class,

            SerializerInterface::class . ' $combinationApiClientSerializer' => new JmsSerializerFactory(ConfigKey::MAIN, ConfigKey::SERIALIZER),
        ],
    ],
];
