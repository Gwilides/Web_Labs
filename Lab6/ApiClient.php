<?php
class ApiClient {
    private $baseUrl;
    private $authType;
    private $authValue;

    public function __construct($baseUrl, $authType = null, $authValue = null) {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->authType = $authType;
        $this->authValue = $authValue;
    }

    private function buildUrl($endpoint) {
        return $this->baseUrl . '/' . ltrim($endpoint, '/');
    }

    private function getHeaders() {
        $headers = [];
        if ($this->authType === 'token') {
            $headers[] = 'Authorization: Bearer ' . $this->authValue;
        } elseif ($this->authType === 'basic') {
            $headers[] = 'Authorization: Basic ' . base64_encode($this->authValue);
        }
        return $headers;
    }

    private function executeRequest($method, $url, $data = null) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());

        if ($data !== null) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, is_array($data) ? json_encode($data) : $data);
            $headers[] = 'Content-Type: application/json';
        }

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode >= 400) {
            throw new Exception("HTTP Error: " . $httpCode . " - " . $response);
        }

        return json_decode($response, true);
    }

    public function get($endpoint, $params = []) {
        $url = $this->buildUrl($endpoint);
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        return $this->executeRequest('GET', $url);
    }

    public function post($endpoint, $data) {
        $url = $this->buildUrl($endpoint);
        return $this->executeRequest('POST', $url, $data);
    }

    public function put($endpoint, $data) {
        $url = $this->buildUrl($endpoint);
        return $this->executeRequest('PUT', $url, $data);
    }

    public function delete($endpoint) {
        $url = $this->buildUrl($endpoint);
        return $this->executeRequest('DELETE', $url);
    }
}