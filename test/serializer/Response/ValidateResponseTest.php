<?php

declare(strict_types=1);

namespace FactorioItemBrowserTestSerializer\CombinationApi\Client\Response;

use FactorioItemBrowser\CombinationApi\Client\Response\ValidateResponse;
use FactorioItemBrowser\CombinationApi\Client\Transfer\ValidatedMod;
use FactorioItemBrowserTestSerializer\CombinationApi\Client\SerializerTestCase;

/**
 * The serializer test of the ValidateResponse class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @coversDefaultClass \FactorioItemBrowser\CombinationApi\Client\Response\ValidateResponse
 */
class ValidateResponseTest extends SerializerTestCase
{
    public function test(): void
    {
        $mod1 = new ValidatedMod();
        $mod1->name = 'abc';
        $mod1->version = 'def';

        $mod2 = new ValidatedMod();
        $mod2->name = 'ghi';
        $mod2->version = 'jkl';

        $object = new ValidateResponse();
        $object->isValid = true;
        $object->mods = [$mod1, $mod2];

        $data = [
            'isValid' => true,
            'mods' => [
                [
                    'name' => 'abc',
                    'version' => 'def',
                    'problems' => [],
                ],
                [
                    'name' => 'ghi',
                    'version' => 'jkl',
                    'problems' => [],
                ],
            ],
        ];

        $this->assertSerialization($data, $object);
        $this->assertDeserialization($object, $data);
    }
}
