<?php

class User {
    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " 
                 SET username = :username, 
                     password = :password, 
                     role = :role";

        $stmt = $this->conn->prepare($query);

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function findByUsername($username) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Debug login process
        error_log("Login Debug - Username: " . $username);
        error_log("Login Debug - User found: " . ($result ? 'Yes' : 'No'));
        if ($result) {
            error_log("Login Debug - User data: " . print_r($result, true));
        }
        
        return $result;
    }

    // Add method to create admin if not exists
    public function createAdminIfNotExists() {
        $admin = $this->findByUsername('admin');
        if (!$admin) {
            $query = "INSERT INTO " . $this->table . " 
                     (username, password, role) VALUES 
                     ('admin', :password, 'admin')";
            
            $stmt = $this->conn->prepare($query);
            // Use simple password hash for testing
            $password = password_hash('password123', PASSWORD_DEFAULT);
            $stmt->bindParam(':password', $password);
            
            if ($stmt->execute()) {
                error_log("Admin user created successfully");
            } else {
                error_log("Failed to create admin user");
            }
        }
    }
}