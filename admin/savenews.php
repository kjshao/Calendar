<?php
include "../conn.php";
$ntime=date("Y/m/d",strtotime("today"));
$sql = "UPDATE news SET date='{$_POST["date"]}', new='{$_POST["news"]}'
        where id={$_POST["id"]}";
//$sql = "UPDATE news SET date='{$ntime}', new='{$_POST["news"]}'
$result=mysql_query($sql);
?>
