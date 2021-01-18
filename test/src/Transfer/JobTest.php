<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client\Transfer;

use DateTimeImmutable;
use FactorioItemBrowser\CombinationApi\Client\Transfer\Job;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the Job class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \FactorioItemBrowser\CombinationApi\Client\Transfer\Job
 */
class JobTest extends TestCase
{
    public function testConstruct(): void
    {
        $instance = new Job();

        $this->assertInstanceOf(DateTimeImmutable::class, $instance->creationTime);
    }
}
