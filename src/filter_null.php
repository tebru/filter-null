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
    return array_filter(
        $array,
        function (&$value) {
            if (!is_array($value)) {
                return null !== $value;
            }

            $value = filter_null($value);

            return true;
        }
    );
}
