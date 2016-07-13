<?php
  include "conn.php";
  date_default_timezone_set('Asia/Shanghai');
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
      <p class="navbar-brand">礼堂信息查询</p>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--<li><a data-toggle='modal' href="#login" style="outline:none" >管理员登录</a></li>-->
        <li><a href="table.php" target="blank" style="outline:none" >场地分配表</a></li>
        <li><a href="#contact" style="outline:none" >联系我们</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a data-toggle='modal' href="#login" style="outline:none" >管理员登录</a></li>-->
        <li><a href="loginform.php" style="outline:none" >管理员登录</a></li>
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
<div class="panel panel-default" style="margin-top: 3px;">
  <div class="panel-heading">
    <button id="button_prev" class="btn btn-info btn-outline btn-small"><span class="glyphicon glyphicon-menu-left"></span></button>
    <button id="button_now" class="btn btn-info btn-outline btn-small">本周</button>
    <button id="button_next" class="btn btn-info btn-outline btn-small"><span class="glyphicon glyphicon-menu-right"></span></button>
    <!--<p id="ntime">0</p>-->
    <?php echo '<button class="btn btn-small btn-success"><span class="glyphicon glyphicon-time"></span>&nbsp;'.date("Y-m-d H:i").'</button>'; ?>
    <p id="ntime" style="display:none">0</p>
  </div>
<div class="table-responsive">
<table id="main_table" class='table table-bordered table-striped table-condensed table-hover'>
    <thead>
      <th>时间</th>
      <th colspan=2 id="day1">周一<br><?php echo date("m/d",strtotime("this Monday"));   ?></th>
      <th colspan=2 id="day2">周二<br><?php echo date("m/d",strtotime("this Tuesday"));  ?></th>
      <th colspan=2 id="day3">周三<br><?php echo date("m/d",strtotime("this Wednesday"));?></th>
      <th colspan=2 id="day4">周四<br><?php echo date("m/d",strtotime("this Thursday")); ?></th>
      <th colspan=2 id="day5">周五<br><?php echo date("m/d",strtotime("this Friday"));   ?></th>
      <th colspan=2 id="day6">周六<br><?php echo date("m/d",strtotime("this Saturday")); ?></th>
      <th colspan=2 id="day7">周日<br><?php echo date("m/d",strtotime("this Sunday"));   ?></th>
      <tr>
        <th>场地</th>
        <th id="ax1">A</th> <th id="ay1">B</th>
        <th id="ax2">A</th> <th id="ay2">B</th>
        <th id="ax3">A</th> <th id="ay3">B</th>
        <th id="ax4">A</th> <th id="ay4">B</th>
        <th id="ax5">A</th> <th id="ay5">B</th>
        <th id="ax6">A</th> <th id="ay6">B</th>
        <th id="ax7">A</th> <th id="ay7">B</th>
      </tr>                           
    </thead>
    <tbody>
    <?php
      include "conn.php";
      $today0 = date("m/d",strtotime("Today"));
      $times = array();
      $times["d1a"] = date(strtotime("this Monday"));
      $times["d1b"] = $times["d1a"];
      $times["d2a"] = date(strtotime("this Tuesday"));
      $times["d2b"] = $times["d2a"];
      $times["d3a"] = date(strtotime("this Wednesday"));
      $times["d3b"] = $times["d3a"];
      $times["d4a"] = date(strtotime("this Thursday"));
      $times["d4b"] = $times["d4a"];
      $times["d5a"] = date(strtotime("this Friday"));
      $times["d5b"] = $times["d5a"];
      $times["d6a"] = date(strtotime("this Saturday"));
      $times["d6b"] = $times["d6a"];
      $times["d7a"] = date(strtotime("this Sunday"));
      $times["d7b"] = $times["d7a"];
      echo "<p id='today0' style='display:none'>{$today0}</p>";
      echo "<p id='timeDay1' style='display:none'>{$times["d1a"]}</p>";
      echo "<p id='timeDay2' style='display:none'>{$times["d1b"]}</p>";
      echo "<p id='timeDay3' style='display:none'>{$times["d2a"]}</p>";
      echo "<p id='timeDay4' style='display:none'>{$times["d2b"]}</p>";
      echo "<p id='timeDay5' style='display:none'>{$times["d3a"]}</p>";
      echo "<p id='timeDay6' style='display:none'>{$times["d3b"]}</p>";
      echo "<p id='timeDay7' style='display:none'>{$times["d4a"]}</p>";
      echo "<p id='timeDay8' style='display:none'>{$times["d4b"]}</p>";
      echo "<p id='timeDay9' style='display:none'>{$times["d5a"]}</p>";
      echo "<p id='timeDay10' style='display:none'>{$times["d5b"]}</p>";
      echo "<p id='timeDay11' style='display:none'>{$times["d6a"]}</p>";
      echo "<p id='timeDay12' style='display:none'>{$times["d6b"]}</p>";
      echo "<p id='timeDay13' style='display:none'>{$times["d7a"]}</p>";
      echo "<p id='timeDay14' style='display:none'>{$times["d7b"]}</p>";

      $timeNew0 = array();
      $timeNew1 = array();
      $Nnew = -1;
      $sql = "SELECT * FROM news";
      $result=mysql_query($sql);
      if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)) {
          $Nnew++;
          $tmp0 = mktime($row["hour1"], $row["min1"], 0, $row["month1"], $row["day1"], $row["year1"]);
          $tmp1 = mktime($row["hour2"], $row["min2"], 0, $row["month2"], $row["day2"], $row["year2"]);
          $timeNew0[$Nnew] = date($tmp0);
          $timeNew1[$Nnew] = date($tmp1);
        }
      }
      echo "<p id='ntimeNew' style='display:none'>{$Nnew}</p>";
      for($j = 0; $j<=$Nnew; $j++){
        $a = "timeNewx".$j;
        $b = "timeNewy".$j;
        echo "<p id=$a style='display:none'>{$timeNew0[$j]}</p>";
        echo "<p id=$b style='display:none'>{$timeNew1[$j]}</p>";
      }

      $sql = "SELECT time,d1a,d1b,d2a,d2b,d3a,d3b,d4a,d4b,d5a,d5b,d6a,d6b,d7a,d7b FROM fbasic";
      $result=mysql_query($sql);
      $nrows = 0;
      if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
          echo "<tr>";
          $i = 0; $nrows++; $strtime = $row["time"]; $timesplit = str_split($strtime,1);
          $time0 = $timesplit[0]*36000; $time0 = $time0 + $timesplit[1]*3600;
          $time0 = $time0 + $timesplit[3]*600;
          $time0 = $time0 + $timesplit[4]*60;
          foreach($row as $x=>$x_value){
            $i++; if(empty($x_value)){$x_value="&nbsp;";}
            if($i==1){
              $idtmp = "row".$nrows;
              echo "<td class='success'>{$x_value}</td><p id=$idtmp style='display:none'>$time0</p>";
            }elseif($i>1){
              $tmp=$i-1;
              $idtmp = "tdx".$nrows."y".$tmp; $time1 = $times[$x] + $time0; $flag=0;
              $idtmpx = $idtmp."x";
              for($j = 0; $j<=$Nnew; $j++){
                if($time1>=$timeNew0[$j] && $time1<$timeNew1[$j]){$flag=1;}
              }
              if($flag==0){
                echo "<td id=$idtmpx class='info'>$x_value</td><p id=$idtmp style='display:none'>$x_value</p>";
              }elseif($flag==1){
                echo "<td id=$idtmpx class='danger'>/</td><p id=$idtmp style='display:none'>$x_value</p>";
              }
            }
          }
          echo "</tr>";
        }
      }
      echo "<p id='nrows' style='display:none'>{$nrows}</p>";
    ?>
    </tbody>
  </table>
  </div>
  </div>
  </div>
</div>
<!-------news-->
<div id="news" class="container-fluid">
<div class="container-fluid">
 <div class="panel panel-default effect2">
  <div class="panel-heading">
   <h4>&nbsp;通知</h4>
  </div>
  <div class="panel-body">
   <div class="row">
    <div class="col-xs-12">
     <ul class="list-group">
       <?php
         include "conn.php";
         $sql = "SELECT * FROM news";
         $result=mysql_query($sql,$conn);
         $i = 0;
         if(mysql_num_rows($result)>0){
           while($row=mysql_fetch_assoc($result)) {
             $i++;
             if($i==1){
               $tmp="list-group-item-success";
             }elseif($i==2){
               $tmp="list-group-item-danger";
             }elseif($i==3){
               $tmp="list-group-item-warning";
             }elseif($i==4){
               $tmp="list-group-item-info";
               $i = 0;
             }
             echo "<li class='list-group-item $tmp'>{$row["year1"]}/{$row["month1"]}/{$row["day1"]}&nbsp;{$row["hour1"]}:{$row["min1"]}";
             echo "&nbsp;至&nbsp;{$row["year2"]}/{$row["month2"]}/{$row["day2"]}&nbsp;{$row["hour2"]}:{$row["min2"]}";
             echo "：{$row["new"]}</li>";
           }
         }
       ?>
     </ul>
    </div>
   </div>
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
          <input type="password" class="form-control" id="password" name="password" placeholder="密码">
        </div>
      <!--<div>
        <input id="methods" type="checkbox"/> 显示密码
      </div>-->
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" id="confirm" name="confirm" class="btn btn-success" data-dismiss="modal">登录</button>
      </div>
    </div>
  </div>
</div>
<!-- contact -->
<div id="contact" class="container-fluid">
<div class="container-fluid">
  <br>
  <h3 class="text">联系我们</h3>
  <br>
  <div class="row">
    <div class="col-sm-5">
      <p><span class="glyphicon glyphicon-map-marker"></span> 辽宁省大连市沙河口区中山路 457 号</p>
      <p><span class="glyphicon glyphicon-phone"></span> +86-411-84379733</p>
      <p><span class="glyphicon glyphicon-envelope"></span> kjshao@dicp.ac.cn</p> 
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
</body>
</html>
