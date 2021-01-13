<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Endpoint\Combination;

use FactorioItemBrowser\CombinationApi\Client\Endpoint\Combination\AbstractCombinationEndpoint;
use FactorioItemBrowser\CombinationApi\Client\Request\Combination\AbstractCombinationRequest;
use FactorioItemBrowser\CombinationApi\Client\Request\Combination\StatusRequest;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the AbstractCombinationEndpoint class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Endpoint\Combination\AbstractCombinationEndpoint
 */
class AbstractCombinationEndpointTest extends TestCase
{
    /**
     * Provides the data for the getRequestHeaders test.
     * @return array<mixed>
     */
    public function provideGetRequestHeaders(): array
    {
        $request1 = new StatusRequest();
        $request1->combinationId = 'abc';

        $request2 = new StatusRequest();
        $request2->shortCombinationId = 'def';

        $request3 = new StatusRequest();
        $request3->modNames = ['ghi', 'jkl'];

        $request4 = new StatusRequest();
        $request4->combinationId = 'abc';
        $request4->shortCombinationId = 'def';
        $request4->modNames = ['ghi', 'jkl'];

        $request5 = new StatusRequest();

        return [
            [$request1, ['Combination-Id' => 'abc']],
            [$request2, ['Short-Combination-Id' => 'def']],
            [$request3, ['Mod-Names' => 'ghi,jkl']],
            [$request4, ['Combination-Id' => 'abc']],
            [$request5, []],
        ];
    }

    /**
     * @covers ::getRequestHeaders
     * @dataProvider provideGetRequestHeaders
     * @param AbstractCombinationRequest $request
     * @param array<mixed> $expectedResult
     */
    public function testGetRequestHeaders(AbstractCombinationRequest $request, array $expectedResult): void
    {
        $instance = $this->getMockBuilder(AbstractCombinationEndpoint::class)
                         ->getMockForAbstractClass();

        $result = $instance->getRequestHeaders($request);

        $this->assertEquals($expectedResult, $result);
    }
}
