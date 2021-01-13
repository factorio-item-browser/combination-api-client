<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Transfer;

use DateTimeImmutable;
use FactorioItemBrowser\CombinationApi\Client\Transfer\JobChange;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the JobChange class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class JobChangeTest extends SerializerTestCase
{
    public function test(): void
    {
        $object = new JobChange();
        $object->initiator = 'abc';
        $object->status = 'def';
        $object->timestamp = new DateTimeImmutable('2038-01-19 03:14:07+00:00');

        $data = [
            'initiator' => 'abc',
            'status' => 'def',
            'timestamp' => '2038-01-19T03:14:07+00:00',
        ];

        $this->assertSerialization($data, $object);
    }
}
