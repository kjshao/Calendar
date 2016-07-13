<?php
  include "conn.php";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <title>化物所礼堂信息查询</title>
  <meta name="author" content="Kejie Shao">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="outline.css">
  <link rel="stylesheet" href="custom.css">
  <script src="jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="scroll.js"></script>
  <script src="md5.js"></script>
  <script src="datePrev.js"></script>
  <script src="dateNow.js"></script>
  <script src="dateNext.js"></script>
  <script src="jquery-dateFormat.min.js"></script>
  <style>
  </style>
</head>
<!-- body -->
<body id="PageHead">
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid" style="margin-left:20px; margin-right:20px;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <p class="navbar-brand">场地分配表</p>
    </div>
  </div>
</nav>
<!-- title -->
<div class="jumbotron text-center">
  <br><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 text-center">
        <img src='dicp.svg' height='100'>
      </div>
      <div class="col-sm-10 text-left">
        <h2>礼堂信息查询系统</h2> 
        <p> 中国科学院大连化学物理研究所</p>
      </div>
    </div>
  </div>
</div>
<!-- week -->
<div id="scheduler" class="container-fluid">
<div class="container-fluid">
<!-- xxx -->
<div class="panel panel-default effect2" style="margin-top: 3px;">
<div class="table-responsive">
<table id="main_table" class='table table-bordered table-striped table-condensed table-hover'>
    <thead>
      <th>时间</th>
      <th colspan=2>周一</th>
      <th colspan=2>周二</th>
      <th colspan=2>周三</th>
      <th colspan=2>周四</th>
      <th colspan=2>周五</th>
      <th colspan=2>周六</th>
      <th colspan=2>周日</th>
      <tr>
        <th>场地</th>
        <th>A</th> <th>B</th>
        <th>A</th> <th>B</th>
        <th>A</th> <th>B</th>
        <th>A</th> <th>B</th>
        <th>A</th> <th>B</th>
        <th>A</th> <th>B</th>
        <th>A</th> <th>B</th>
      </tr>                           
    </thead>
    <tbody>
    <?php
      include "conn.php";
      $sql = "SELECT time,d1a,d1b,d2a,d2b,d3a,d3b,d4a,d4b,d5a,d5b,d6a,d6b,d7a,d7b FROM fbasic";
      $result=mysql_query($sql,$conn);
      if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
          echo "<tr>";
          foreach($row as $x=>$x_value){
            if(empty($x_value)) {$x_value="&nbsp;";}
            echo "<td>{$x_value}</td>";
          }
          echo "</tr>";
        }
      }
    ?>
    </tbody>
  </table>
  </div>
  </div>
  </div>
</div>
<!-------news-->
<!-- footer -->
<footer class="container-fluid text-center">
  <a href="#PageHead" title="返回顶部">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>CopyRight 1999-2016. Dalian Institute of Chemical Physics, Chinese Academy of Sciences. All Rights Reserved.</p>
  <p>中国科学院大连化学物理研究所 版权所有 辽 ICP 备 05000861 号</p>
</footer>
</body>
</html>
