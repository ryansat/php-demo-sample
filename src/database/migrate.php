<?php
define('BASE_PATH', dirname(__DIR__));

// Autoload function for migrations and seeds
spl_autoload_register(function ($className) {
    $paths = [
        BASE_PATH . '/database/migrations/',
        BASE_PATH . '/database/seeds/',
        BASE_PATH . '/database/'
    ];

    foreach ($paths as $path) {
        $file = $path . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

require_once BASE_PATH . '/config/Database.php';
require_once __DIR__ . '/MigrationManager.php';
require_once __DIR__ . '/DatabaseSeeder.php';

// Run migrations
$migrationManager = new MigrationManager();
$migrationManager->runMigrations();

// Run seeds
$seeder = new DatabaseSeeder();
$seeder->run();

echo "Database migration and seeding completed successfully!\n";