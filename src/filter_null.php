<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

namespace Tebru;

/**
 * Remove all nulls from an array
 *
 * @param array $array
 * @return array
 */
function filter_null(array $array)
{
    $result = [];
    foreach ($array as $key => $value) {
        if (null === $value) {
            continue;
        }

        $result[$key] = is_array($value) ? filter_null($value) : $value;
    }

    return $result;
}
