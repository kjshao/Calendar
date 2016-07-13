<?php
session_start();
include('../conn.php');
// check if variable is set and Add Journal Button pressed.
//$file="logx.txt";
$year1 = $_POST["year1"];
$month1 = $_POST["month1"];
$day1 = $_POST["day1"];
$hour1 = $_POST["hour1"];
$min1 = $_POST["min1"];
$year2 = $_POST["year2"];
$month2 = $_POST["month2"];
$day2 = $_POST["day2"];
$hour2 = $_POST["hour2"];
$min2 = $_POST["min2"];
$new = $_POST["newText"];
//file_put_contents($file,$year1);

$sql = "INSERT INTO news (year1,month1,day1,hour1,min1,year2,month2,day2,hour2,min2,new) VALUES ('$year1','$month1','$day1','$hour1','$min1','$year2','$month2','$day2','$hour2','$min2','$new')";
$result=mysql_query($sql);
$sql = "SET @count=0";
$result=mysql_query($sql);
$sql = "UPDATE SET news.id=@count:=@count+1";
$result=mysql_query($sql);
?>
