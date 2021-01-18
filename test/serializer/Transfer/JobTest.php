<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Transfer;

use DateTimeImmutable;
use FactorioItemBrowser\CombinationApi\Client\Transfer\Job;
use FactorioItemBrowser\CombinationApi\Client\Transfer\JobChange;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the Job class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class JobTest extends SerializerTestCase
{
    public function test(): void
    {
        $change1 = new JobChange();
        $change1->initiator = 'abc';
        $change1->status = 'def';
        $change1->timestamp = new DateTimeImmutable('2038-01-19 03:14:07+00:00');

        $change2 = new JobChange();
        $change2->initiator = 'ghi';
        $change2->status = 'jkl';
        $change2->timestamp = new DateTimeImmutable('2038-01-19 02:14:07+00:00');

        $object = new Job();
        $object->id = 'mno';
        $object->combinationId = 'pqr';
        $object->priority = 'stu';
        $object->status = 'vwx';
        $object->queuePosition = 42;
        $object->errorMessage = 'yza';
        $object->creationTime = new DateTimeImmutable('2038-01-19 01:14:07+00:00');
        $object->changes = [$change1, $change2];

        $data = [
            'id' => 'mno',
            'combinationId' => 'pqr',
            'priority' => 'stu',
            'status' => 'vwx',
            'queuePosition' => 42,
            'errorMessage' => 'yza',
            'creationTime' => '2038-01-19T01:14:07+00:00',
            'changes' => [
                [
                    'initiator' => 'abc',
                    'status' => 'def',
                    'timestamp' => '2038-01-19T03:14:07+00:00',
                ],
                [
                    'initiator' => 'ghi',
                    'status' => 'jkl',
                    'timestamp' => '2038-01-19T02:14:07+00:00',
                ],
            ],
        ];

        $this->assertSerialization($data, $object);
    }
}
