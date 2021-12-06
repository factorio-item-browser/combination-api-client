<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

/**
 * The test case for the serializer tests.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class SerializerTestCase extends TestCase
{
    private SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $builder = new SerializerBuilder();
        $builder->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy());

        $this->serializer = $builder->build();
    }

    /**
     * @param array<mixed> $expectedData
     * @param object $object
     */
    public function assertSerialization(array $expectedData, object $object): void
    {
        $actualData = json_decode($this->serializer->serialize($object, 'json'), true);
        $this->assertEquals($expectedData, $actualData);
    }

    /**
     * @param object $expectedObject
     * @param array<mixed> $data
     */
    public function assertDeserialization(object $expectedObject, array $data): void
    {
        $actualObject = $this->serializer->deserialize((string) json_encode($data), get_class($expectedObject), 'json');
        $this->assertEquals($expectedObject, $actualObject);
    }
}
