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
  <link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="outline.css">
  <script src="../jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="edit.js"></script>
  <script src="add.js"></script>
  <script src="delete.js"></script>
  <script src="scroll.js"></script>
  <style>
  .center {
    float: none;
    margin-left: auto;
    margin-right: auto;
  }
  .navbar {
     -webkit-box-shadow: 10px 10px 22px -7px rgba(0,0,0,0.8);
     -moz-box-shadow: 10px 10px 22px -7px rgba(0,0,0,0.8);
     box-shadow: 10px 10px 22px -7px rgba(0,0,0,0.8);
  /* www.cssmatic.com/box-shadow */  
  }
  .navbar-form {
    margin-top: 12px;
  }
  .jumbotron { 
    background-color: #000d7d;
    color: #ffffff;
    background-color: #ffffff;
    color: #000d7d;
    margin-bottom: 0;
  }
  .table td {
     text-align: center;   
  }
  .table tr {
     text-align: center;   
  }
  .table th {
     text-align: center;   
  }
  .table {
    border: 0.5px solid #000000;
  }
  .table-bordered > thead > tr > th,
  .table-bordered > tbody > tr > th,
  .table-bordered > tfoot > tr > th,
  .table-bordered > thead > tr > td,
  .table-bordered > tbody > tr > td,
  .table-bordered > tfoot > tr > td {
    border: 0.5px solid #000000;
  }
  .box-shadow {
     -webkit-box-shadow: 10px 10px 22px -7px rgba(0,0,0,0.8);
     -moz-box-shadow: 10px 10px 22px -7px rgba(0,0,0,0.8);
     box-shadow: 10px 10px 22px -7px rgba(0,0,0,0.8);
  }
  .table-hover tbody tr:hover td:hover {
     background-color: #9383b5;
     color: #ffffff;
     display: block;
     border: 0;
     -webkit-box-shadow: 0px 0px 29px -1px rgba(147,131,181,1);
     -moz-box-shadow: 0px 0px 29px -1px rgba(147,131,181,1);
     box-shadow: 0px 0px 29px -1px rgba(147,131,181,1);
  }
  .panel {
    border: 1.5px solid #000000;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #000d7d;
  }
  </style>
</head>
<!-- body -->
<body id="PageHead">
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><p class="navbar-brand">礼堂信息查询</p></li>
        <li><a href="#scheduler">场地安排表</a></li>
        <li><a href="#contact">联系我们</a></li>
      </ul>
      <form class="navbar-form form-inline navbar-right">
        <input class="form-control" type="text" placeholder="查询">
        <button class="btn btn-success btn-outline" type="submit">查询</button>
      </form>
    </div>
  </div>
</nav>
<!-- title -->
<div class="jumbotron text-center">
  <br><br>
  <h2>礼堂信息查询系统</h2> 
  <p> 中国科学院大连化学物理研究所</p>
</div>
<!-- week -->
<div id="scheduler" class="container-fluid">
  <div class="container-fluid">
    <div class="btn-group btn-group-justified">
     <button type="button" class="btn btn-info btn-outline btn-lg" data-toggle="modal" data-target="#readme">说明</button>
     <button type="button" id="button_add" class="btn btn-success btn-outline btn-lg">增加时间段</button>
     <button type="button" id="button_delete" class="btn btn-danger btn-outline btn-lg">删除时间段</button>
    </div>
  </div>
<div class="container-fluid">
<div class="panel panel-default box-shadow" style="margin-top: 3px;">
<table class='table table-bordered table-striped table-condensed table-hover'>
    <thead>
      <th >编号</th>
      <th >时间</th>
      <th colspan=2">周一</th>
      <th colspan=2">周二</th>
      <th colspan=2">周三</th>
      <th colspan=2">周四</th>
      <th colspan=2">周五</th>
      <th colspan=2">周六</th>
      <th colspan=2">周日</th>
      <tr>
        <th></th>
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
      $sql = "SELECT id,time,d1a,d1b,d2a,d2b,d3a,d3b,d4a,d4b,d5a,d5b,d6a,d6b,d7a,d7b FROM fbasic";
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
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="readme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">使用说明</h4>
      </div>
      <div class="modal-body">
        <ul class="list-group">
          <li class="list-group-item">1、<kbd style="background-color: #9383b5">增加时间段</kbd>
            在表格底部按添加一行。
          </li>
          <li class="list-group-item">2、<kbd style="background-color: #9383b5">删除时间段</kbd>
            在对话框中输入要删除的行的 编号 进行删除操作。
          </li>
          <li class="list-group-item">3、除表格头两行及第一列以外，其他表格内容均可编辑。
            单击相应单元格进入编辑状态，输入文字后回车或单击其他单元格更新表格内容。
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
<!-- contact -->
<div id="contact" class="container-fluid">
  <br>
  <h3 class="text">联系我们</h3>
  <br>
  <div class="row">
    <div class="col-sm-5">
      <p><span class="glyphicon glyphicon-map-marker"></span> 辽宁省大连市沙河口区中山路 457 号</p>
      <p><span class="glyphicon glyphicon-phone"></span> +86 0411-84379733</p>
      <p><span class="glyphicon glyphicon-envelope"></span> kjshao@dicp.ac.cn</p> 
    </div>
  </div>
</div>
<!-- footer -->
<footer class="container-fluid text-center">
  <a href="#PageHead" title="返回顶部">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>CopyRight 1999-2014. Dalian Institute of Chemical Physics, Chinese Academy of Sciences. All Rights Reserved.</p>
  <p>中国科学院大连化学物理研究所 版权所有 辽 ICP 备 05000861 号</p>
</footer>
</body>
</html>
