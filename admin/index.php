<?php
  include "../conn.php";
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
  <link rel="stylesheet" href="custom.css">
  <script src="../jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="edit.js"></script>
  <script src="add.js"></script>
  <script src="delete.js"></script>
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
        <img src='../dicp.svg' height='100'>
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
     <button type="button" id="btn_readme" class="btn btn-info btn-outline btn-small" data-toggle="modal" data-target="#readme">说明</button>
     <button type="button" id="button_add" class="btn btn-success btn-outline btn-small">增加时间段</button>
     <button type="button" id="button_delete" class="btn btn-danger btn-outline btn-small">删除时间段</button>
  </div>
<div class="container-fluid">
<!-- xxx -->
<div class="panel panel-default effect2" style="margin-top: 3px;">
<div class="table-responsive">
<table id="main_table" class='table table-bordered table-striped table-condensed table-hover'>
    <thead>
      <th>编号</th>
      <th>时间</th>
      <th colspan=2">周一<br><?php echo date("m/d",strtotime("this Monday"));?>   </th>
      <th colspan=2">周二<br><?php echo date("m/d",strtotime("this Tuesday"));?>  </th>
      <th colspan=2">周三<br><?php echo date("m/d",strtotime("this Wednesday"));?></th>
      <th colspan=2">周四<br><?php echo date("m/d",strtotime("this Thursday"));?> </th>
      <th colspan=2">周五<br><?php echo date("m/d",strtotime("this Friday"));?>   </th>
      <th colspan=2">周六<br><?php echo date("m/d",strtotime("this Saturday"));?> </th>
      <th colspan=2">周日<br><?php echo date("m/d",strtotime("this Sunday"));?>   </th>
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
            在表格底部按 编号 顺序添加一行。
          </li>
          <li class="list-group-item">2、<kbd style="background-color: #9383b5">删除时间段</kbd>
            在对话框中输入要删除的行的 编号 进行删除操作。
          </li>
          <li class="list-group-item">3、除表格头两行及第一列以外，表格中的其他内容均可编辑。
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
<script>
  $("#btn_readme").on('focus', function(){
    $('button').blur();
  });
</script>
<script>
//  var seen={};
//  $('#main_table td').each(function(){
//    var $this=$(this);
//    var index=$this.index();
//    var txt=$this.text();
//    if(seen[index]===txt){
//      $($this.parent().prev().children()[index]).attr('rowspan',2);
//      $this.hide();
//    }else{
//      seen[index]=txt;
//    }
//  });
</script>
</body>
</html>
