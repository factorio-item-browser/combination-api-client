<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Response\Job;

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
        $job1->status = 'ghi';
        $job1->errorMessage = 'jkl';

        $job2 = new Job();
        $job2->id = 'mno';
        $job2->combinationId = 'pqr';
        $job2->status = 'stu';
        $job2->errorMessage = 'vwx';

        $object = new ListResponse();
        $object->jobs = [$job1, $job2];

        $data = [
            'jobs' => [
                [
                    'id' => 'abc',
                    'combinationId' => 'def',
                    'status' => 'ghi',
                    'errorMessage' => 'jkl',
                    'changes' => [],
                ],
                [
                    'id' => 'mno',
                    'combinationId' => 'pqr',
                    'status' => 'stu',
                    'errorMessage' => 'vwx',
                    'changes' => [],
                ],
            ],
        ];

        $this->assertSerialization($data, $object);
    }
}
