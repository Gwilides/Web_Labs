<?php
$str = 'jsdfj jsdj jrtetj jwesdf jaj jerwer jsdfsdfh jdsfj jqwej';
$template = '/j.{3}j/';
$mathces = [];
preg_match_all($template, $str, $mathces);
echo var_dump($mathces);