<?php
class UsersTableSeeder {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function run() {
        $users = [
            [
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role' => 'admin'
            ],
            [
                'username' => 'cs_user',
                'password' => password_hash('cs123', PASSWORD_DEFAULT),
                'role' => 'customer_service'
            ]
        ];

        $stmt = $this->conn->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");

        foreach ($users as $user) {
            $stmt->execute($user);
        }
    }
}