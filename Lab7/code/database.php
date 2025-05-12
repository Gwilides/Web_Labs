<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class Database {
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli(
            'db',
            'root',
            'helloworld',
            'web',
            3306
        );
        $this->mysqli->set_charset('utf8mb4');
    }

    public function getConnection(): mysqli {
        return $this->mysqli;
    }
}