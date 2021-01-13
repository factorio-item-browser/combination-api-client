<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Request\Job;

use FactorioItemBrowser\CombinationApi\Client\Request\Job\ListRequest;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the ListRequest class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ListRequestTest extends SerializerTestCase
{
    public function test(): void
    {
        $object = new ListRequest();
        $object->combinationId = 'abc';
        $object->status = 'def';
        $object->order = 'ghi';
        $object->limit = 42;

        $this->assertSerialization([], $object);
    }
}
