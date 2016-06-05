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
     time VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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
  }else{
    echo "Error in creating database: ".mysql_error()."\n";
  }
}
?>
