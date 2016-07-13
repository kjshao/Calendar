<?php
$dbname="field_basic";
$conn=mysql_connect("localhost","root","admin123");
// after connection to the database
mysql_query("set names 'UTF8'"); //write
mysql_query("set character 'UTF8'"); //read
////////////////////////////////////////////
if(!$conn) {
  die('Could not connect: '.mysql_error());
}
$db_selected=mysql_select_db($dbname,$conn);
if(!$db_selected) {
  $sql="CREATE DATABASE $dbname";
  if(mysql_query($sql,$conn)){
    echo "Database $dbname created successfully\n";
    $db_selected=mysql_select_db($dbname,$conn);
    $table="fbasic";
    $sqlCreate = "CREATE TABLE IF NOT EXISTS {$table} (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      time VARCHAR(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d1a VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d1b VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d2a VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d2b VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d3a VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d3b VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d4a VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d4b VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d5a VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d5b VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d6a VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d6b VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d7a VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      d7b VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
    )";
    $result=mysql_query($sqlCreate);
    if(!$result){
      echo "Error in creating table: ".mysql_error()."\n";
    }else{
      echo "Table $table created successfully.\n";
    }
//////////////////////////////////
    $table="users";
    $sqlCreate = "CREATE TABLE IF NOT EXISTS {$table} (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      user VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      passwd VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
    )";
    $result=mysql_query($sqlCreate);
    if(!$result){
      echo "Error in creating table: ".mysql_error()."\n";
    }else{
      echo "Table $table created successfully.\n";
    }
    $sql = "INSERT INTO users (user,passwd) VALUES ('admin','21232f297a57a5a743894a0e4a801fc3')";
    $result=mysql_query($sql);
//////////////////////////////////
    $table="news";
    $sqlCreate = "CREATE TABLE IF NOT EXISTS {$table} (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      year1 VARCHAR(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      month1 VARCHAR(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      day1 VARCHAR(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      hour1 VARCHAR(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      min1 VARCHAR(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      year2 VARCHAR(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      month2 VARCHAR(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      day2 VARCHAR(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      hour2 VARCHAR(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      min2 VARCHAR(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      new VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
    )";
    $result=mysql_query($sqlCreate);
    if(!$result){
      echo "Error in creating table: ".mysql_error()."\n";
    }else{
      echo "Table $table created successfully.\n";
    }
  }else{
    echo "Error in creating database: ".mysql_error()."\n";
  }
}
?>
