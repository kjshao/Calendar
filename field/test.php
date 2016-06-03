<?php
$sql = "UPDATE fbasic SET time='{$_POST["time"]}', d1a='{$_POST["d1a"]}', d1b='{$_POST["d1b"]}',
        d2a='{$_POST["d2a"]}', d2b='{$_POST["d2b"]}', d3a='{$_POST["d3a"]}', d3b='{$_POST["d3b"]}',
        d4a='{$_POST["d4a"]}', d4b='{$_POST["d4b"]}', d5a='{$_POST["d5a"]}', d5b='{$_POST["d5b"]}',
        d6a='{$_POST["d6a"]}', d6b='{$_POST["d6b"]}', d7a='{$_POST["d7a"]}', d7b='{$_POST["d7b"]}',
        where id={$_POST["id"]}";
echo $sql;
?>
