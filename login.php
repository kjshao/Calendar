<?php
echo "<meta charset='utf-8'>";
session_start();
session_unset();
include "conn.php";
//$file="log.txt";
$user=$_POST["userid"];
$ps=$_POST["password"];
$passwd=md5($ps);
$sql = "SELECT passwd FROM users WHERE user=\"{$user}\"";
$res=mysql_query($sql);
//$test=mysql_fetch_assoc($res);
//file_put_contents($file,$test['passwd']);
if($r=mysql_fetch_assoc($res)) {
  if($r['passwd']==$passwd) {
    $_SESSION['admin']="admin";
    header("Location: admin/index.php");
    exit();
  }else{
    //echo "<script> alert(\"用户不存在或密码错误！\"); </script>";
    echo "用户不存在或密码错误！";
    exit();
  }
}else{
  echo "用户不存在或密码错误！";
}
?>
