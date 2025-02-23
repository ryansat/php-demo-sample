<?php
require_once __DIR__ . '/../config/Database.php';

class DatabaseSeeder {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function run() {
        $seeders = glob(__DIR__ . '/seeds/*.php');
        foreach ($seeders as $seeder) {
            require_once $seeder;
            $className = basename($seeder, '.php');
            $seeder = new $className($this->conn);
            $seeder->run();
            echo "Executed seeder: " . $className . "\n";
        }
    }
}