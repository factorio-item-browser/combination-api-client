<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client;

use BluePsyduck\JmsSerializerFactory\JmsSerializerFactory;
use FactorioItemBrowser\CombinationApi\Client\Constant\ConfigKey;
use Interop\Container\ContainerInterface;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerExceptionInterface;

/**
 * The test case for the serializer tests.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class SerializerTestCase extends TestCase
{
    private SerializerInterface $serializer;

    /**
     * @throws ContainerExceptionInterface
     */
    protected function setUp(): void
    {
        $config = require(__DIR__ . '/../../config/combination-api-client.php');

        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->any())
                  ->method('get')
                  ->willReturnMap([
                      ['config', $config],
                      [IdenticalPropertyNamingStrategy::class, new IdenticalPropertyNamingStrategy()],
                  ]);

        $serializerFactory = new JmsSerializerFactory(ConfigKey::MAIN, ConfigKey::SERIALIZER);
        $this->serializer = $serializerFactory($container, SerializerInterface::class); // @phpstan-ignore-line
    }

    /**
     * @param array<mixed> $expectedData
     */
    public function assertSerialization(array $expectedData, object $object): void
    {
        $actualData = json_decode($this->serializer->serialize($object, 'json'), true);
        $this->assertEquals($expectedData, $actualData);
    }

    /**
     * @param array<mixed> $data
     */
    public function assertDeserialization(object $expectedObject, array $data): void
    {
        $actualObject = $this->serializer->deserialize((string) json_encode($data), get_class($expectedObject), 'json');
        $this->assertEquals($expectedObject, $actualObject);
    }
}
