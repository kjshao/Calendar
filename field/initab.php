<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "field_basic";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//creating the table if it not exists
$sqlCreate = "CREATE TABLE IF NOT EXISTS fbasic (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            time VARCHAR(30) NOT NULL,
            d1a VARCHAR(30) NOT NULL,
            d1b VARCHAR(30) NOT NULL,
            d2a VARCHAR(30) NOT NULL,
            d2b VARCHAR(30) NOT NULL,
            d3a VARCHAR(30) NOT NULL,
            d3b VARCHAR(30) NOT NULL,
            d4a VARCHAR(30) NOT NULL,
            d4b VARCHAR(30) NOT NULL,
            d5a VARCHAR(30) NOT NULL,
            d5b VARCHAR(30) NOT NULL,
            d6a VARCHAR(30) NOT NULL,
            d6b VARCHAR(30) NOT NULL,
            d7a VARCHAR(30) NOT NULL,
            d7b VARCHAR(30) NOT NULL
            )";
$conn->exec($sqlCreate);
?>
