<?php
$curl = curl_init();
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
    if ($httpCode >= 400) {
        $errorMsg = match($httpCode) {
            400 => 'Bad Request',
            401 => 'Unauthorized',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            default => "HTTP Error: $httpCode"
        };
        throw new Exception($errorMsg);
    }

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


try {
    $result = universalRequest(
        $curl,
        'https://jsonplaceholder.typicode.com/posts/1',
        'GET'
    );
    print_r($result);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    curl_close($curl);
}
?>