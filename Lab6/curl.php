<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CAINFO, 'C:\certs\cacert.pem');
$url = 'https://jsonplaceholder.typicode.com/posts';

function curlGet($curl, $url) {
    curl_setopt_array($curl, [
        CURLOPT_URL => $url
    ]);

    return curl_exec($curl);
}

function curlPost($curl, $url) {
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode([
            'title' => 'Lab6',
            'body' => 'test',
            'userId' => 1
        ]),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json'
        ]
    ]);

    return curl_exec($curl);
}

function curlPut($curl, $url) {
    curl_setopt_array($curl, [
        CURLOPT_URL => $url . '/1',
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => json_encode([
            'title' => 'Updated Lab6',
            'body' => 'update',
            'userId' => 1
        ]),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json'
        ]
    ]);

    return curl_exec($curl);
}

function curlDel($curl, $url) {
    curl_setopt_array($curl, [
        CURLOPT_URL => $url . '/1',
        CURLOPT_CUSTOMREQUEST => 'DELETE'
    ]);

    return curl_exec($curl);
}

echo curlDel($curl, $url);