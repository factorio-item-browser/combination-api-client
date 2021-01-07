<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Request;

use FactorioItemBrowser\CombinationApi\Client\Request\ValidateRequest;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the ValidateRequest class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Request\ValidateRequest
 */
class ValidateRequestTest extends SerializerTestCase
{
    public function test(): void
    {
        $object = new ValidateRequest();
        $object->combinationId = 'abc';
        $object->shortCombinationId = 'def';
        $object->modNames = ['ghi', 'jkl'];

        $this->assertSerialization([], $object);
    }
}
