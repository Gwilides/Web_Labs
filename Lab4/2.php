<?php
$str = 'a1b2c3';
$matches = [];
$result = preg_replace_callback(
    '/\d+/',
    function ($matches) {;
        return (int)$matches[0] / 2;
    },
    $str);
echo $result;