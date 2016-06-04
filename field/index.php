<?php
  include "conn.php";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <title>Scheduler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="../jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="edit.js"></script>
  <script src="add.js"></script>
  <style>
  .jumbotron {
      background-color: #0000b3;
      color: #ffffff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #0000b3;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
  }
  
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
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
  .table-clickable{
     cursor:pointer;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  </style>
</head>
<!-- body -->
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<!-- navbar -->
<nav class="navbar navbar-right navbar-fixed-top">
  <div class="container">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#scheduler">场地安排表</a></li>
        <li><a href="#contact">联系我们</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- title -->
<div class="jumbotron text-center">
  <h2>礼堂信息查询系统</h2> 
  <p> 中国科学院大连化学物理研究所</p>
</div>

<!-- week -->
<button type="button" id="button_add" class="btn btn-success">增加时间段</button>
<button type="button" id="button_delete" class="btn btn-danger">删除时间段</button>
<div id="scheduler" class="container-fluid">
  <h3>场地安排表</h3>
<table class='table table-bordered table-condensed table-striped table-hover'>
    <thead>
      <th class="success">ID</th>
      <th class="success">时间</th>
      <th colspan=2 class="success">周一</th>
      <th colspan=2 class="success">周二</th>
      <th colspan=2 class="success">周三</th>
      <th colspan=2 class="success">周四</th>
      <th colspan=2 class="success">周五</th>
      <th colspan=2 class="success">周六</th>
      <th colspan=2 class="success">周日</th>
      <tr>
        <th class="danger"></th>
        <th class="danger">场地</th>
        <th class="danger">A</th> <th class="danger">B</th>
        <th class="danger">A</th> <th class="danger">B</th>
        <th class="danger">A</th> <th class="danger">B</th>
        <th class="danger">A</th> <th class="danger">B</th>
        <th class="danger">A</th> <th class="danger">B</th>
        <th class="danger">A</th> <th class="danger">B</th>
        <th class="danger">A</th> <th class="danger">B</th>
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
          echo "<td>{$row["id"]}</td>";
          echo "<td>{$row["time"]}</td>";
          echo "<td>{$row["d1a"]}</td>"; echo "<td>{$row["d1b"]}</td>";
          echo "<td>{$row["d2a"]}</td>"; echo "<td>{$row["d2b"]}</td>";
          echo "<td>{$row["d3a"]}</td>"; echo "<td>{$row["d3b"]}</td>";
          echo "<td>{$row["d4a"]}</td>"; echo "<td>{$row["d4b"]}</td>";
          echo "<td>{$row["d5a"]}</td>"; echo "<td>{$row["d5b"]}</td>";
          echo "<td>{$row["d6a"]}</td>"; echo "<td>{$row["d6b"]}</td>";
          echo "<td>{$row["d7a"]}</td>"; echo "<td>{$row["d7b"]}</td>";
          echo "</tr>";
        }
      }
    ?>
    </tbody>
  </table>
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
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>CopyRight 1999-2014. Dalian Institute of Chemical Physics, Chinese Academy of Sciences. All Rights Reserved.</p>
  <p>中国科学院大连化学物理研究所 版权所有 辽 ICP 备 05000861 号</p>
</footer>
<!-- smooth scrolling -->
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

   // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 600, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
      });
    } // End if
  });
});
</script>


</body>
</html>
