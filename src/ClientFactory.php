<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client;

use FactorioItemBrowser\CombinationApi\Client\Constant\ConfigKey;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use JMS\Serializer\SerializerInterface;
use Psr\Container\ContainerInterface;

/**
 * The factory for the client.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ClientFactory
{
    public function __invoke(ContainerInterface $container): ClientInterface
    {
        $config = $container->get('config')[ConfigKey::PROJECT];

        $guzzleClient = new GuzzleClient([
            'base_uri' => $config[ConfigKey::BASE_URI],
            RequestOptions::TIMEOUT => $config[ConfigKey::TIMEOUT],
        ]);
        $serializer = $container->get(SerializerInterface::class . ' $combinationApiClientSerializer');
        $endpoints = array_map(fn (string $alias) => $container->get($alias), $config[ConfigKey::ENDPOINTS]);

        return new Client($guzzleClient, $serializer, $endpoints);
    }
}
