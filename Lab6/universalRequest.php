<?php
$curl = curl_init();
$url = 'https://jsonplaceholder.typicode.com/posts';

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CAINFO, 'C:\certs\cacert.pem');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);

function universalRequest($curl, $url, $method = 'GET', $data = null, $headers = []) {
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => array_merge([
            'Content-Type: application/json',
            'Accept: application/json'
        ], $headers)
    ];

    switch (strtoupper($method)) {
        case 'POST':
            $options[CURLOPT_POST] = true;
            break;
        case 'PUT':
        case 'DELETE':
            $options[CURLOPT_CUSTOMREQUEST] = strtoupper($method);
            break;
    }
    
    if ($data !== null && in_array(strtoupper($method), ['POST', 'PUT'])) {
        $options[CURLOPT_POSTFIELDS] = json_encode($data);
    }
    
    curl_setopt_array($curl, $options);
    
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if (!$response) {
        throw new Exception('cURL Error: ' . curl_error($curl));
    }

    $jsonResponse = json_decode($response, true);
    if(json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('JSON Decode Error: ' . json_last_error_msg());
    }

    return [
        'status' => $httpCode,
        'data' => $jsonResponse
    ];
}

$postData = [
    'title' => 'Lab6',
    'body' => 'Test',
    'userId' => 1
];
$putData = [
    'title' => 'Updated Lab6',
    'body' => 'Updated test',
    'userId' => 1
];
$customHeaders = [
    'X-API-Key: sample12345',
    'Cache-Control: no-cache'
];

echo universalRequest($curl, $url, 'POST', $postData);

curl_close($curl);
?>