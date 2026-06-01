<?php
$host = 'localhost'; 
$db   = 'assetdb';
$user = 'postgres';
$pass = 'Cjy1104?';
$port = "5432";

$dsn = "pgsql:host=$host;port=$port;dbname=$db;";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     die("Database connection failed: " . $e->getMessage());
}
?>