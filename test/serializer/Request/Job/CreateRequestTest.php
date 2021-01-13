<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Request\Job;

use FactorioItemBrowser\CombinationApi\Client\Request\Job\CreateRequest;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the CreateRequest class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class CreateRequestTest extends SerializerTestCase
{
    public function test(): void
    {
        $object = new CreateRequest();
        $object->combinationId = 'abc';
        $object->priority = 'def';

        $data = [
            'combinationId' => 'abc',
            'priority' => 'def',
        ];

        $this->assertSerialization($data, $object);
    }
}
