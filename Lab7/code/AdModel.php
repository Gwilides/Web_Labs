<?php
require_once 'database.php';

class AdModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function createAd(string $email, string $title, string $description, string $category): bool {
        $stmt = $this->db->prepare("
            INSERT INTO ad (email, title, description, category) 
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param('ssss', $email, $title, $description, $category);
        return $stmt->execute();
    }

    public function getAllAds(): array {
        $result = $this->db->query("
            SELECT * FROM ad 
            ORDER BY created DESC
        ");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}