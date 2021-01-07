<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Transfer;

use FactorioItemBrowser\CombinationApi\Client\Transfer\ValidationProblem;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the ValidationProblem class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Transfer\ValidationProblem
 */
class ValidationProblemTest extends SerializerTestCase
{
    public function test(): void
    {
        $object = new ValidationProblem();
        $object->type = 'abc';
        $object->dependency = 'def';

        $data = [
            'type' => 'abc',
            'dependency' => 'def',
        ];

        $this->assertSerialization($data, $object);
        $this->assertDeserialization($object, $data);
    }
}
