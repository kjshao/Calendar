<?php
include "../conn.php";
$sql = "DELETE FROM news WHERE id={$_POST["id"]}";
$result=mysql_query($sql,$conn);
$sql = "SET @count=0";
$result=mysql_query($sql,$conn);
$sql = "UPDATE news SET news.id=@count:=@count+1";
$result=mysql_query($sql,$conn);
?>
