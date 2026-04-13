<?php
// App
define('APP_NAME', 'Eric Roberts');
// define('BASE_URL', '/individual/');
// Production
define('BASE_URL', '/individual/');

// Paths
define('ROOT_PATH', __DIR__ . '/../');
define('VIEWS_PATH', ROOT_PATH . 'views/');
define('PARTIALS_PATH', VIEWS_PATH . 'partials/');
define('PUBLIC_PATH', BASE_URL . 'public/');

// Database
define('DB_HOST', 'localhost');
define('DB_NAME', 'ericroberts');
define('DB_USER', 'root');
define('DB_PASS', '');

// Environment
define('ENV', 'development'); // change to 'production' on live server

// Error reporting based on environment
if (ENV === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}