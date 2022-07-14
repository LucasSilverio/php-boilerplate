<?php

if (!function_exists('debug')) {
    function debug(...$data) {
        foreach ($data as $d) {
            var_dump($d);
        }

        die();
    }
}
