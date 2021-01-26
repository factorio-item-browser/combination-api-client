<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Transfer;

use DateTimeImmutable;
use FactorioItemBrowser\CombinationApi\Client\Transfer\Combination;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the Combination class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class CombinationTest extends SerializerTestCase
{
    public function test(): void
    {
        $object = new Combination();
        $object->id = 'abc';
        $object->shortId = 'def';
        $object->modNames = ['ghi', 'jkl'];
        $object->isDataAvailable = true;
        $object->exportTime = new DateTimeImmutable('2038-01-19 03:14:07+00:00');

        $data = [
            'id' => 'abc',
            'shortId' => 'def',
            'modNames' => ['ghi', 'jkl'],
            'isDataAvailable' => true,
            'exportTime' => '2038-01-19T03:14:07+00:00',
        ];

        $this->assertSerialization($data, $object);
        $this->assertDeserialization($object, $data);
    }
}
