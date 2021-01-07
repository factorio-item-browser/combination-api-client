<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client;

/**
 * The config provider of the client.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ConfigProvider
{
    /**
     * @return array<mixed>
     */
    public function __invoke(): array
    {
        return array_merge(
            require(__DIR__ . '/../config/dependencies.php'),
            require(__DIR__ . '/../config/combination-api-client.php'),
        );
    }
}
