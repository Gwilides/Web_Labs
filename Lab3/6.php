<?php
$a = 10;
$b = 3;
echo $a % $b, "\n\n";

if ($a % $b === 0)
    echo 'Делится ', $a / $b;
else
    echo 'Делится с остатком ', $a % $b;

$st = pow(2, 10);
$sqrt = sqrt(245);
$numbers = [4, 2, 5, 19, 13, 0, 10];
$sum = 0;
foreach ($numbers as $value)
    $sum += pow($value, 2);
$result = sqrt($sum);
echo "\n\n", $st , "\n", $sqrt, "\n", $result, "\n\n";

$sqrt = sqrt(379);
echo $sqrt, "\n", round($sqrt), "\n", round($sqrt, 1), "\n", round($sqrt, 2);
$sqrt = sqrt(587);
$dict = ['floor' => floor($sqrt), 'ceil' => ceil($sqrt)];
echo "\n", $sqrt, "\n", $dict['floor'], "\n", $dict['ceil'], "\n\n";

$numbers = [4, -2, 5, 19, -130, 0, 10];
echo min($numbers), "\n", max($numbers), "\n\n";

echo rand(1, 100), "\n\n";
$numbers = [];
while(count($numbers) !== 10)
    array_push($numbers, rand());
echo var_dump($numbers);