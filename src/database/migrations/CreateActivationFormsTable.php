<?php
class CreateActivationFormsTable {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function up() {
        $sql = "CREATE TABLE IF NOT EXISTS activation_forms (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            activation_code VARCHAR(255) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )";
        
        $this->conn->exec($sql);
    }
}