<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "field_basic";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//creating the table if it not exists
$sqlCreate = "CREATE TABLE IF NOT EXISTS fbasic (
            id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            time INT(6) NOT NULL,
            depart INT(6) NOT NULL
            )";
$conn->exec($sqlCreate);
echo "Table MyGuests created successfully";
?>
