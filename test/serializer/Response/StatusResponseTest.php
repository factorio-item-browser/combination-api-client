<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Response;

use FactorioItemBrowser\CombinationApi\Client\Response\StatusResponse;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the StatusResponse class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Response\StatusResponse
 */
class StatusResponseTest extends SerializerTestCase
{
    public function test(): void
    {
        $object = new StatusResponse();
        $object->id = 'abc';
        $object->shortId = 'def';
        $object->modNames = ['ghi', 'jkl'];
        $object->isDataAvailable = true;

        $data = [
            'id' => 'abc',
            'shortId' => 'def',
            'modNames' => ['ghi', 'jkl'],
            'isDataAvailable' => true,
        ];

        $this->assertSerialization($data, $object);
        $this->assertDeserialization($object, $data);
    }
}
