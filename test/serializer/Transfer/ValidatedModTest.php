<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Transfer;

use FactorioItemBrowser\CombinationApi\Client\Transfer\ValidatedMod;
use FactorioItemBrowser\CombinationApi\Client\Transfer\ValidationProblem;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the ValidatedMod class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Transfer\ValidatedMod
 */
class ValidatedModTest extends SerializerTestCase
{
    public function test(): void
    {
        $problem1 = new ValidationProblem();
        $problem1->type = 'ghi';
        $problem1->dependency = 'jkl';

        $problem2 = new ValidationProblem();
        $problem2->type = 'mno';
        $problem2->dependency = 'pqr';

        $object = new ValidatedMod();
        $object->name = 'abc';
        $object->version = 'def';
        $object->problems = [$problem1, $problem2];

        $data = [
            'name' => 'abc',
            'version' => 'def',
            'problems' => [
                [
                    'type' => 'ghi',
                    'dependency' => 'jkl',
                ],
                [
                    'type' => 'mno',
                    'dependency' => 'pqr',
                ],
            ],
        ];

        $this->assertSerialization($data, $object);
        $this->assertDeserialization($object, $data);
    }
}
