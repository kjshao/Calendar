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
      <p class="navbar-brand">礼堂信息查询</p>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a data-toggle='modal' href="#login" style="outline:none" >管理员登录</a></li>
        <li><a href="#scheduler" style="outline:none" >场地安排表</a></li>
        <li><a href="#contact" style="outline:none" >联系我们</a></li>
      </ul>
      <form class="navbar-form form-inline navbar-right">
        <?php echo '<input class="form-control" type="text" placeholder="'.date("Y-m-d").'">'; ?>
        <button class="btn btn-success btn-outline" type="submit">查询</button>
      </form>
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
      <th colspan=2">周一<br><?php echo date("m/d",strtotime("this Monday"));?>   </th>
      <th colspan=2">周二<br><?php echo date("m/d",strtotime("this Tuesday"));?>  </th>
      <th colspan=2">周三<br><?php echo date("m/d",strtotime("this Wednesday"));?></th>
      <th colspan=2">周四<br><?php echo date("m/d",strtotime("this Thursday"));?> </th>
      <th colspan=2">周五<br><?php echo date("m/d",strtotime("this Friday"));?>   </th>
      <th colspan=2">周六<br><?php echo date("m/d",strtotime("this Saturday"));?> </th>
      <th colspan=2">周日<br><?php echo date("m/d",strtotime("this Sunday"));?>   </th>
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
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">管理员登录</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="userid" name="userid" placeholder="用户名">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="passwd" name="passwd" placeholder="密码">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" id="confirm" name="confirm" class="btn btn-success">提交</button>
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
<script>
  $("#btn_readme").on('focus', function(){
    $('button').blur();
  });
</script>
</body>
</html>
