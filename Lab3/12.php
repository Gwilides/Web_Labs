<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$average = array_sum($numbers) / count($numbers);
echo $average, "\n";

echo ((1 + 100) * 100) / 2 . "\n";

$numbers = [1, 4, 9, 16, 25];
$sqrt = array_map('sqrt', $numbers);
print_r($sqrt);

$alphabet = range('a', 'z');
$values = range(1, 26);
$array = array_combine($alphabet, $values);
print_r($array);

$str = '1234567890';
$pairs = str_split($str, 2);
$sum = array_sum(array_map('intval', $pairs));
echo $sum;