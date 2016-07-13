<?php
include "../conn.php";
$sql = "INSERT INTO news (date,new) VALUES ('','')";
$result=mysql_query($sql);
$sql = "SET @count=0";
$result=mysql_query($sql);
$sql = "UPDATE news SET news.id=@count:=@count+1";
$result=mysql_query($sql);
?>
