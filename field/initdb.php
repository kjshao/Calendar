<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "field_basic";

$pdo = new PDO("mysql:host=$servername", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbname = "`".str_replace("`","``",$dbname)."`";
$pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
$pdo->query("use $dbname");
?>
