Filter Null
===========

Simple function to remove null values from an array.  This is an improvement
over the default functionality of `array_filter` as it only removes null
values.  Additionally, it works on nested arrays.

Installation
------------

```
composer require tebru/filter-null
```

Usage
-----

```php
<?php

use Tebru;

$array = [1, 2, 3, null, 4];
Tebru\filter_null($array); // [1, 2, 3, 4]
```
