<?php
  date_default_timezone_set('Asia/Shanghai');
  session_start();
  if( $_SESSION['admin'] == "admin" ){
  }else{
    header("Location: ../index.php");
  }
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
  <link rel="stylesheet" href="typeahead.css">
  <script src="../jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="edit.js"></script>
  <script src="editTime.js"></script>
  <script src="editnews.js"></script>
  <script src="add.js"></script>
  <script src="addnews.js"></script>
  <script src="delete.js"></script>
  <script src="deletenews.js"></script>
  <script src="deleteNew.js"></script>
  <script src="scroll.js"></script>
  <script src="typeahead.bundle.min.js"></script>
  <script src="typeahead.js"></script>
  <script src="newsForm.js"></script>
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
      <p class="navbar-brand">管理员</p>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class='nav navbar-nav'>
        <li><a href='exit.php' style='outline:none'>&nbsp;&nbsp;&nbsp;退出</a></li>
      </ul>
      <!--<form class="navbar-form form-inline navbar-right">
        <?php //echo '<input class="form-control" type="text" placeholder="'.date("Y-m-d").'">'; ?>
        <button class="btn btn-success btn-outline" type="submit">查询</button>
      </form>-->
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
<!-- xxx -->
<div class="panel panel-default" style="margin-top: 3px;">
<div class="panel-heading">
  <button type="button" id="btn_readme" class="btn btn-info btn-outline btn-small" data-toggle="modal" data-target="#readme">说明</button>
  <button type="button" id="button_add" class="btn btn-success btn-outline btn-small">添加</button>
  <button type="button" id="button_delete" class="btn btn-danger btn-outline btn-small">删除</button>
</div>
<div class="table-responsive">
<table id="mainTable" class='table table-bordered table-striped table-condensed table-hover'>
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
      include "../conn.php";
      $sql = "SELECT id,time,d1a,d1b,d2a,d2b,d3a,d3b,d4a,d4b,d5a,d5b,d6a,d6b,d7a,d7b FROM fbasic";
      $result=mysql_query($sql,$conn);
      if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
          echo "<tr>";
          $i = 0;
          foreach($row as $x=>$x_value){
            $i++;
            if(empty($x_value)) {$x_value="&nbsp;";}
            if($i==1){
              echo "<td>{$x_value}</td>";
            }else if($i==2){
              echo "<td class='time'>{$x_value}</td>";
            }else if($i>2){
              echo "<td class='editable'>{$x_value}</td>";
            }
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
<!-- table news -->
<div class="container-fluid">
<div id="news" class="container-fluid">
<!--<div class="container-fluid box-shadow">
<div class="panel panel-default box-shadow" style="margin-top: 3px;">
<div class="table-responsive">-->
<table id="tableNews" class='table table-bordered table-striped table-condensed table-hover'>
    <thead>
      <th>编号</th>
      <th>开始时间</th>
      <th>结束时间</th>
      <th>通知内容</th>
      <th colspan=2>
        <button type="button" id="btnAddNews" class="btn btn-success btn-outline btn-small glyphicon glyphicon-plus" data-toggle="modal">添加</button>
      </th>
    </thead>
    <tbody>
    <?php
      include "../conn.php";
      $sql = "SELECT * FROM news";
      $result=mysql_query($sql);
      $count = 0;
      if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
          $count++;
          echo "<tr>";
          echo "<td id={$row["id"]}>{$count}</td>";
          echo "<td>{$row["year1"]}/{$row["month1"]}/{$row["day1"]}&nbsp;{$row["hour1"]}:{$row["min1"]}</td>";
          echo "<td>{$row["year2"]}/{$row["month2"]}/{$row["day2"]}&nbsp;{$row["hour2"]}:{$row["min2"]}</td>";
          echo "<td>{$row["new"]}</td>";
          echo '
          <td>
            <button type="button" class="btn btn-default btn-small btn-delete-news glyphicon glyphicon-trash" data-toggle="modal" data-target="#confirmDelete" data-id="'.$row['id'].'" data-count="'.$count.'"></button>
          </td>';
          echo "</tr>";
        }
      }
    ?>
  </tbody>
  </table>
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
<!-- Modal -->
<div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">添加通知</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>起始：</label>
            <input type="text" style="width:70px" class="typeahead1 form-control" id="year1" name="year1" placeholder="年">
            <label>/</label>
            <input type="text" style="width:70px" class="typeahead2 form-control" id="month1" name="month1" placeholder="月">
            <label>/</label>
            <input type="text" style="width:70px" class="typeahead3 form-control" id="day1" name="day1" placeholder="日">
            <input type="text" style="width:70px" class="typeahead4 form-control" id="hour1" name="hour1" placeholder="小时">
            <label>:</label>
            <input type="text" style="width:70px" class="typeahead5 form-control" id="min1" name="min1" placeholder="分钟">
          </div>
          <div class="form-group">
            <label>结束：</label>
            <input type="text" style="width:70px" class="typeahead1 form-control" id="year2" name="year2" placeholder="年">
            <label>/</label>
            <input type="text" style="width:70px" class="typeahead2 form-control" id="month2" name="month2" placeholder="月">
            <label>/</label>
            <input type="text" style="width:70px" class="typeahead3 form-control" id="day2" name="day2" placeholder="日">
            <input type="text" style="width:70px" class="typeahead4 form-control" id="hour2" name="hour2" placeholder="小时">
            <label>:</label>
            <input type="text" style="width:70px" class="typeahead5 form-control" id="min2" name="min2" placeholder="分钟">
          </div>
          <!--<div class="form-group">
            <input type="texterea" class="form-control" id="new" name="new" placeholder="通知内容">
          </div>-->
          <div class="form-group">
            <textarea class="form-control" id="newText" name="newText" placeholder="通知内容"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" id="submitNews" name="submitNews" class="btn btn-success">保存</button>
      </div>
    </div>
  </div>
</div>
<!-- footer -->
<footer class="container-fluid text-center">
  <a href="#PageHead" title="返回顶部">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>CopyRight 1999-2016. Dalian Institute of Chemical Physics, Chinese Academy of Sciences. All Rights Reserved.</p>
  <p>中国科学院大连化学物理研究所 版权所有 辽 ICP 备 05000861 号</p>
</footer>
<script>
  $(".btn").on('focus', function(){
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
<?php
  include_once('delete_confirm.php');
?>
</body>
</html>
