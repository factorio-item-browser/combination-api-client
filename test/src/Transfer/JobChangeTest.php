<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Transfer;

use DateTimeImmutable;
use FactorioItemBrowser\CombinationApi\Client\Transfer\JobChange;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the JobChange class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Transfer\JobChange
 */
class JobChangeTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $instance = new JobChange();

        $this->assertInstanceOf(DateTimeImmutable::class, $instance->timestamp);
    }
}