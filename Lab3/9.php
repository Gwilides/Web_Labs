<?php
$array = [];
for ($i = 1; $i <= 10; $i++) {
    array_push($array, str_repeat('x', $i));
}
print_r($array);

function arrayFill($value, $count) {
    $array = [];
    for ($i = 0; $i < $count; $i++) {
        array_push($array, $value);
    }
    return $array;
}
print_r(arrayFill('x', 5));

$array = [[1, 2, 3], [4, 5], [6]];
echo array_sum(array_map('array_sum', $array)), "\n";

$array = [];
for ($i = 0; $i < 3; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        $array[$i][] = $i * 3 + $j;
    }
}
print_r($array);

$array = [2, 5, 3, 9];
$result = $array[0] * $array[1] + $array[2] * $array[3];
echo $result, "\n";

$user = ['name' => 'Иван', 'surname' => 'Иванов', 'patronymic' => 'Иванович'];
echo $user['surname'] . ' ' . $user['name'] . ' ' . $user['patronymic'] . "\n";

$date = ['year' => date('Y'), 'month' => date('m'), 'day' => date('d')];
echo $date['year'] . '-' . $date['month'] . '-' . $date['day'] . "\n";

$arr = ['a', 'b', 'c', 'd', 'e'];
echo count($arr), "\n";

$arr = ['a', 'b', 'c', 'd', 'e'];
echo $arr[count($arr) - 1] . ' ' . $arr[count($arr) - 2];