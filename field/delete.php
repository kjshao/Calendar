<?php
include "conn.php";
$sql = "DELETE FROM fbasic WHERE id={$_POST["id"]}";
$result=mysql_query($sql,$conn);
$sql = "SET @count=0";
$result=mysql_query($sql,$conn);
$sql = "UPDATE fbasic SET fbasic.id=@count:=@count+1";
$result=mysql_query($sql,$conn);
?>
