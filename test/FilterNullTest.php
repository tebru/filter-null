<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

namespace Tebru\Test;

use PHPUnit_Framework_TestCase;
use Tebru;

/**
 * Class FilterNullTest
 *
 * @author Nate Brunette <n@tebru.net>
 */
class FilterNullTest extends PHPUnit_Framework_TestCase
{
    public function testCanRemoveNulls()
    {
        $result = Tebru\filter_null([0, '', false, null]);
        self::assertSame([0, '', false], $result);
    }

    public function testCanRemoveNullsFromAssociated()
    {
        $result = Tebru\filter_null(['foo' => 0, 'bar' => '', 'baz' => false, 'qux' => null]);
        self::assertSame(['foo' => 0, 'bar' => '', 'baz' => false], $result);
    }

    public function testCanRemoveNestedArrays()
    {
        $array = [
            'foo' => 0,
            'bar' => [
                'foo' => 0,
                'bar' => '',
                'baz' => null,
                'qux' => [
                    'foo' => 0,
                    'bar' => '',
                    'baz' => false,
                    'qux' => null
                ],
            ],
            'qux' => null,
        ];

        $expected = [
            'foo' => 0,
            'bar' => [
                'foo' => 0,
                'bar' => '',
                'qux' => [
                    'foo' => 0,
                    'bar' => '',
                    'baz' => false,
                ],
            ],
        ];

        $result = Tebru\filter_null($array);
        self::assertSame($expected, $result);
    }
}
