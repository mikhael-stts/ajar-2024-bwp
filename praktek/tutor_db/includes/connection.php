<?php
session_start();
define('BASE_URL', 'http://localhost/ajar/BWP_2024/praktek/tutor_db');
/**
 * https://phpdelusions.net/pdo
 *
 * In summary, PDO::ATTR_EMULATE_PREPARES is a PDO attribute that controls whether PDO should emulate prepared statements when using certain database drivers. You can enable or disable emulation based on your compatibility and security requirements, but it's crucial to handle user inputs securely when emulation is enabled
 */

$host = 'localhost';
$name = 'kuliah_bwp_php';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

try {
    $dsn = "mysql:host=$host;dbname=$name;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
