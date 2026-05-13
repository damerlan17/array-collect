<?php

namespace Collect;

if (!function_exists('collection')) {
    function collection(array $array = []): Collect
    {
        return new Collect($array);
    }
}