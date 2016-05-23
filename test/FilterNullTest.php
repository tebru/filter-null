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
        $result = Tebru\filter_null([1, 'test', true, null]);
        self::assertSame([1, 'test', true], $result);
    }

    public function testCanRemoveNullsFromAssociated()
    {
        $result = Tebru\filter_null(['foo' => 1, 'bar' => 'test', 'baz' => true, 'qux' => null]);
        self::assertSame(['foo' => 1, 'bar' => 'test', 'baz' => true], $result);
    }

    public function testCanRemoveNestedArrays()
    {
        $array = [
            'foo' => 1,
            'bar' => [
                'foo' => 1,
                'bar' => 'test',
                'baz' => null,
                'qux' => [
                    'foo' => 1,
                    'bar' => 'test',
                    'baz' => true,
                    'qux' => null
                ],
            ],
            'qux' => null,
        ];

        $expected = [
            'foo' => 1,
            'bar' => [
                'foo' => 1,
                'bar' => 'test',
                'qux' => [
                    'foo' => 1,
                    'bar' => 'test',
                    'baz' => true,
                ],
            ],
        ];

        $result = Tebru\filter_null($array);
        self::assertSame($expected, $result);
    }
}
