<?php

$host = '127.0.0.1';
$port = 3306;
$user = 'SchemaMaster';
$password = 'Sch3ma_Ma$ter13!';
$dbname = 'cars_php';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $password);
    
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optionally set default fetch mode to fetch associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    
} catch (PDOException $e) {
    // Handle connection errors gracefully
    die('Connection failed: ' . $e->getMessage());
}

?>
