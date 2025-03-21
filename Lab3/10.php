<?php
function CheckSum($a, $b) {
    return ($a + $b) > 10;
}

function Equality($a, $b) {
    return $a === $b;
}

$test = 0;
if ($test == 0) echo 'верно';

$age = 30;

if ($age < 10 || $age > 99) {
    echo "Число меньше 10 или больше 99\n";
} else {
    $sum = ($age % 10) + intdiv($age, 10);
    echo ($sum <= 9) ? "Сумма цифр однозначна\n" : "Сумма цифр двузначна\n";
}

$arr = [2, 5, 3];

if (count($arr) == 3) {
    echo array_sum($arr);
}