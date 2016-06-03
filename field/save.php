<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "field_basic";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE fbasic SET time='{$_POST["time"]}', d1a='{$_POST["d1a"]}', d1b='{$_POST["d1b"]}',
        d2a='{$_POST["d2a"]}', d2b='{$_POST["d2b"]}', d3a='{$_POST["d3a"]}', d3b='{$_POST["d3b"]}',
        d4a='{$_POST["d4a"]}', d4b='{$_POST["d4b"]}', d5a='{$_POST["d5a"]}', d5b='{$_POST["d5b"]}',
        d6a='{$_POST["d6a"]}', d6b='{$_POST["d6b"]}', d7a='{$_POST["d7a"]}', d7b='{$_POST["d7b"]}'
        where id={$_POST["id"]}";
// Prepare statement
$stmt = $pdo->prepare($sql);
// execute the query
$stmt->execute();
// echo a message to say the UPDATE succeeded
//echo $stmt->rowCount() . " records UPDATED successfully";
?>
