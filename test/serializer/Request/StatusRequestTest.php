<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Request;

use FactorioItemBrowser\CombinationApi\Client\Request\StatusRequest;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the StatusRequest class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Request\StatusRequest
 */
class StatusRequestTest extends SerializerTestCase
{
    public function test(): void
    {
        $object = new StatusRequest();
        $object->combinationId = 'abc';
        $object->shortCombinationId = 'def';
        $object->modNames = ['ghi', 'jkl'];

        $this->assertSerialization([], $object);
    }
}
