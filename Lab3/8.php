<?php
function increaseEnthusiasm($str) {
    return $str . "!";
}

function repeatThreeTimes($str) {
    return $str . $str . $str;
}

function cut($str, $count = 10) {
    return substr($str, 0, $count);
}

function showNumbers($numbers) {
    if (empty($numbers))
        return;
    echo array_shift($numbers), ' ';
    showNumbers($numbers);
}

function digitAddition($number) {
    while($number > 9) {
        $digits = str_split((string)$number);
        $number = array_sum($digits);
    }
    return $number;
}

$string = "Hello world";
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$number = 2025;

echo increaseEnthusiasm($string), "\n";
echo repeatThreeTimes($string), "\n";
echo increaseEnthusiasm(repeatThreeTimes($string)), "\n";
echo cut($string), "\n";
echo showNumbers($numbers), "\n";
echo digitAddition($number), "\n";