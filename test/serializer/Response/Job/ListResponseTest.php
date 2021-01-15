<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Response\Job;

use DateTimeImmutable;
use FactorioItemBrowser\CombinationApi\Client\Response\Job\ListResponse;
use FactorioItemBrowser\CombinationApi\Client\Transfer\Job;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the ListResponse class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ListResponseTest extends SerializerTestCase
{
    public function test(): void
    {
        $job1 = new Job();
        $job1->id = 'abc';
        $job1->combinationId = 'def';
        $job1->priority = 'ghi';
        $job1->status = 'jkl';
        $job1->errorMessage = 'mno';
        $job1->creationTime = new DateTimeImmutable('2038-01-19 03:14:07+00:00');

        $job2 = new Job();
        $job2->id = 'pqr';
        $job2->combinationId = 'stu';
        $job2->priority = 'vwx';
        $job2->status = 'yza';
        $job2->errorMessage = 'bcd';
        $job2->creationTime = new DateTimeImmutable('2038-01-19 02:14:07+00:00');

        $object = new ListResponse();
        $object->jobs = [$job1, $job2];

        $data = [
            'jobs' => [
                [
                    'id' => 'abc',
                    'combinationId' => 'def',
                    'priority' => 'ghi',
                    'status' => 'jkl',
                    'errorMessage' => 'mno',
                    'creationTime' => '2038-01-19T03:14:07+00:00',
                    'changes' => [],
                ],
                [
                    'id' => 'pqr',
                    'combinationId' => 'stu',
                    'priority' => 'vwx',
                    'status' => 'yza',
                    'errorMessage' => 'bcd',
                    'creationTime' => '2038-01-19T02:14:07+00:00',
                    'changes' => [],
                ],
            ],
        ];

        $this->assertSerialization($data, $object);
    }
}
