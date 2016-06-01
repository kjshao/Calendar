<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "field_basic";

echo "xx";
$pdo = new PDO("mysql:host=$servername", $username, $password);
echo "xx";
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "xx";

$dbname = "`".str_replace("`","``",$dbname)."`";
echo "xx";
$pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
echo "xx";
$pdo->query("use $dbname");
echo "xx";
?>
