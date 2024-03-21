<?php
require "config.php";
//  don't use ./config.php , if can lead to wrong directory***
// connect with database

// build dsn
// dsn =data source name
// mysql=drive name followed by host and localhast name
// second is dbname and third is charset 
$dsn = "mysql:host=$host; dbname=$dbname;charset=UTF8mb4";

// And find error  >> try catch
try {
    // pdo = php data object
    $pdo = new PDO($dsn, $user, $password);
    // set attr at pdo
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // if ($pdo) {
    //     echo "db connect";
    // }
} catch (PDOException $e) {
    die($e->getMessage());
}