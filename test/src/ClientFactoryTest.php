<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client;

use FactorioItemBrowser\CombinationApi\Client\Client;
use FactorioItemBrowser\CombinationApi\Client\ClientFactory;
use FactorioItemBrowser\CombinationApi\Client\Constant\ConfigKey;
use FactorioItemBrowser\CombinationApi\Client\Endpoint\EndpointInterface;
use GuzzleHttp\Client as GuzzleClient;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * The PHPUnit test of the ClientFactory class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \FactorioItemBrowser\CombinationApi\Client\ClientFactory
 */
class ClientFactoryTest extends TestCase
{
    public function testInvoke(): void
    {
        $config = [
            ConfigKey::MAIN => [
                ConfigKey::API_KEY => 'abc',
                ConfigKey::BASE_URI => 'https://www.example.com/',
                ConfigKey::TIMEOUT => 42,
                ConfigKey::ENDPOINTS => [
                    'generic-client-endpoint1',
                    'generic-client-endpoint2',
                ],
            ],
        ];

        $endpoint1 = $this->createMock(EndpointInterface::class);
        $endpoint2 = $this->createMock(EndpointInterface::class);
        $serializer = $this->createMock(SerializerInterface::class);

        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->any())
                  ->method('get')
                  ->willReturnMap([
                      ['config', $config],
                      ['generic-client-endpoint1', $endpoint1],
                      ['generic-client-endpoint2', $endpoint2],
                      [SerializerInterface::class . ' $combinationApiClientSerializer', $serializer],
                  ]);

        $expectedGuzzleClient = new GuzzleClient([
            'base_uri' => 'https://www.example.com/',
            'headers' => [
                'Api-Key' => 'abc',
            ],
            'timeout' => 42,
        ]);
        $expectedInstance = new Client($expectedGuzzleClient, $serializer, [$endpoint1, $endpoint2]);

        $factory = new ClientFactory();
        $instance = $factory($container);

        $this->assertEquals($expectedInstance, $instance);
    }
}
