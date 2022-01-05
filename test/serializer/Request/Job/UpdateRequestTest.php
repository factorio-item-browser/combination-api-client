<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Request\Job;

use FactorioItemBrowser\CombinationApi\Client\Request\Job\UpdateRequest;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the UpdateRequest class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class UpdateRequestTest extends SerializerTestCase
{
    public function test(): void
    {
        $object = new UpdateRequest();
        $object->id = 'abc';
        $object->status = 'def';
        $object->errorMessage = 'ghi';

        $data = [
            'status' => 'def',
            'errorMessage' => 'ghi',
        ];

        $expectedObject = new UpdateRequest();
        $expectedObject->status = 'def';
        $expectedObject->errorMessage = 'ghi';

        $this->assertSerialization($data, $object);
        $this->assertDeserialization($expectedObject, $data);
    }
}
