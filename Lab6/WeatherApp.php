<?php
require_once 'ApiClient.php';

define('OWM_API_KEY', 'YOUR_API_KEY');

$client = new ApiClient('https://api.openweathermap.org/data/2.5');

try {
    $response = $client->get('/weather', [
        'q' => 'Kaliningrad,RU',
        'appid' => OWM_API_KEY,
        'units' => 'metric',
        'lang' => 'ru'
    ]);
    
    $temp = $response['main']['temp'];
    $description = $response['weather'][0]['description'];
    $humidity = $response['main']['humidity'];
    
    echo "Погода в Калининграде:\n";
    echo "-----------------\n";
    echo "Температура: $temp °C\n";
    echo "Описание: " . ucfirst($description) . "\n";
    echo "Влажность: $humidity%\n";

} catch (Exception $e) {
    die("Ошибка: " . $e->getMessage());
}