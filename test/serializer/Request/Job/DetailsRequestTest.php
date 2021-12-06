<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Request\Job;

use FactorioItemBrowser\CombinationApi\Client\Request\Job\DetailsRequest;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the DetailsRequest class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class DetailsRequestTest extends SerializerTestCase
{
    public function test(): void
    {
        $object = new DetailsRequest();
        $object->id = 'abc';

        $data = [];

        $expectedObject = new DetailsRequest();

        $this->assertSerialization($data, $object);
        $this->assertDeserialization($expectedObject, $data);
    }
}
