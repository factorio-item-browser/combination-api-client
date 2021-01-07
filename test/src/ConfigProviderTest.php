<?php

declare(strict_types=1);

namespace FactorioItemBrowserTest\CombinationApi\Client;

use FactorioItemBrowser\CombinationApi\Client\ConfigProvider;
use FactorioItemBrowser\CombinationApi\Client\Constant\ConfigKey;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the ConfigProvider class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\ConfigProvider
 */
class ConfigProviderTest extends TestCase
{
    /**
     * @covers ::__invoke
     */
    public function testInvoke(): void
    {
        $instance = new ConfigProvider();
        $result = $instance();

        $this->assertArrayHasKey('dependencies', $result);
        $this->assertArrayHasKey('factories', $result['dependencies']);

        $this->assertArrayHasKey(ConfigKey::PROJECT, $result);
        $this->assertArrayHasKey(ConfigKey::ENDPOINTS, $result[ConfigKey::PROJECT]);
        $this->assertArrayHasKey(ConfigKey::SERIALIZER, $result[ConfigKey::PROJECT]);
    }
}
