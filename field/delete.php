<?php
include "conn.php";
$sql = "DELETE FROM fbasic WHERE id={$_POST["id"]}";
$result=mysql_query($sql,$conn);
?>
