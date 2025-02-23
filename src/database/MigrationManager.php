<?php
require_once __DIR__ . '/../config/Database.php';

class MigrationManager {
    private $conn;
    private $inTransaction = false;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function runMigrations() {
        try {
            // Start transaction
            $this->inTransaction = $this->conn->beginTransaction();
            
            $files = glob(__DIR__ . '/migrations/*.php');
            sort($files);
            
            // First run migrations without foreign keys
            foreach ($files as $file) {
                if (strpos($file, 'CreateUsersTable') !== false) {
                    $this->executeMigration($file);
                }
            }
            
            // Then run migrations with foreign keys
            foreach ($files as $file) {
                if (strpos($file, 'CreateUsersTable') === false) {
                    $this->executeMigration($file);
                }
            }
            
            // Commit transaction only if it was started
            if ($this->inTransaction) {
                $this->conn->commit();
                $this->inTransaction = false;
            }
            echo "All migrations completed successfully!\n";
            
        } catch (Exception $e) {
            // Rollback transaction only if it was started
            if ($this->inTransaction) {
                $this->conn->rollBack();
                $this->inTransaction = false;
            }
            echo "Migration failed: " . $e->getMessage() . "\n";
            throw $e;
        }
    }

    private function executeMigration($file) {
        $className = pathinfo($file, PATHINFO_FILENAME);
        if (!class_exists($className)) {
            require_once $file;
        }
        
        $className = preg_replace('/^\d+_/', '', $className);
        
        if (class_exists($className)) {
            $migration = new $className($this->conn);
            $migration->up();
            echo "Executed migration: " . $className . "\n";
        } else {
            echo "Warning: Class {$className} not found in {$file}\n";
        }
    }
}