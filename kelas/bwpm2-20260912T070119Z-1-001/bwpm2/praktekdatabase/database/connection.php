<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'kuliah_bwp_php';
$port = 3306;
$charset = "utf8mb4";

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $options = [];
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Gagal konek : " . $e->getMessage());
}
