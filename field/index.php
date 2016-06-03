<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <title>Scheduler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="../jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
<script type="text/javascript">
$(document).ready(function($) {
    $(".table td").click(function() {
     if($(this).children('input').length > 0)
       return;
     var td = $(this);
     var data = $(this).text();
     $(this).html("");
     var input = $("<input type='text'>");
     input.val(data);
     //input.css("background-color",$(this).css("background-color"));
     input.css("border-width","0px");
     input.css("width",$(this).css("width"));
     //input.css("width",20);
     input.appendTo($(this));
     input.trigger("focus");
     input.trigger("select");  
     input.keydown(function(event){
       switch(event.keyCode){
       case 13:
         td.html($(this).val());
         var tds = td.parent("tr").children("td");
         var i = tds.eq(0).text(); var t = tds.eq(1).text();
         var x1 = tds.eq(2).text(); var y1 = tds.eq(3).text();
         var x2 = tds.eq(4).text(); var y2 = tds.eq(5).text();
         var x3 = tds.eq(6).text(); var y3 = tds.eq(7).text();
         var x4 = tds.eq(8).text(); var y4 = tds.eq(9).text();
         var x5 = tds.eq(10).text(); var y5 = tds.eq(11).text();
         var x6 = tds.eq(12).text(); var y6 = tds.eq(13).text();
         var x7 = tds.eq(14).text(); var y7 = tds.eq(15).text();
         $.post("save.php", {
            id:i,time:t,d1a:x1,d1b:y1,
            d2a:x2,d2b:y2,d3a:x3,d3b:y3,
            d4a:x4,d4b:y4,d5a:x5,d5b:y5,
            d6a:x6,d6b:y6,d7a:x7,d7b:y7
           },function(data){});
         break;
       case 27:
         td.html(data);
         break;
       }
     }).blur(function(){
         td.html($(this).val());
         var tds = td.parent("tr").children("td");
         var i = tds.eq(0).text(); var t = tds.eq(1).text();
         var x1 = tds.eq(2).text(); var y1 = tds.eq(3).text();
         var x2 = tds.eq(4).text(); var y2 = tds.eq(5).text();
         var x3 = tds.eq(6).text(); var y3 = tds.eq(7).text();
         var x4 = tds.eq(8).text(); var y4 = tds.eq(9).text();
         var x5 = tds.eq(10).text(); var y5 = tds.eq(11).text();
         var x6 = tds.eq(12).text(); var y6 = tds.eq(13).text();
         var x7 = tds.eq(14).text(); var y7 = tds.eq(15).text();
         $.post("save.php", {
            id:i,time:t,d1a:x1,d1b:y1,
            d2a:x2,d2b:y2,d3a:x3,d3b:y3,
            d4a:x4,d4b:y4,d5a:x5,d5b:y5,
            d6a:x6,d6b:y6,d7a:x7,d7b:y7
           },function(data){});
     });
    }); // click function
}); // ready function
</script>
</head>
<!-- body -->
<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "field_basic";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class TableRows extends RecursiveIteratorIterator { 
  function __construct($it) { 
      parent::__construct($it, self::LEAVES_ONLY); 
  }
  function current() {
      //return "<td class='table-clickable'>" . parent::current(). "</td>";
      return "<td class='info'>" . parent::current(). "</td>";
  }
  function beginChildren() {
      echo "<tr>";
  } 
  function endChildren() {
      echo "</tr>" . "\n";
  }
} 
?>

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
      $stmt = $pdo->prepare("SELECT id,time,d1a,d1b,d2a,d2b,d3a,d3b,d4a,d4b,d5a,d5b,d6a,d6b,d7a,d7b FROM fbasic"); 
      $stmt->execute();
      $row = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { echo $v;}
    ?>
    <?php $pdo=null; ?>
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
