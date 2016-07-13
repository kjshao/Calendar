<?php
include "../conn.php";
$sql = "DELETE FROM news WHERE id={$_POST["id"]}";
$result=mysql_query($sql);
$sql = "SET @count=0";
$result=mysql_query($sql);
$sql = "UPDATE $journals SET $journals.id=@count:=@count+1";
$result=mysql_query($sql);
?>
