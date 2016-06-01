<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <title>Scheduler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="./jquery/1.12.4/jquery.min.js"></script>
  <script src="./bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
<div id="scheduler" class="container-fluid">
  <h3>场地安排表</h3>
  <table class="table table-bordered">
    <thead>
      <th>时间</th>
      <th colspan=2 class="success">周一</th>
      <th colspan=2 class="success">周二</th>
      <th colspan=2 class="success">周三</th>
      <th colspan=2 class="success">周四</th>
      <th colspan=2 class="success">周五</th>
      <th colspan=2 class="success">周六</th>
      <th colspan=2 class="success">周日</th>
    </thead>
    <tbody>
      <tr>
        <td>场地</td>
        <td class="danger">A</td> <td class="danger">B</td>
        <td class="danger">A</td> <td class="danger">B</td>
        <td class="danger">A</td> <td class="danger">B</td>
        <td class="danger">A</td> <td class="danger">B</td>
        <td class="danger">A</td> <td class="danger">B</td>
        <td class="danger">A</td> <td class="danger">B</td>
        <td class="danger">A</td> <td class="danger">B</td>
      </tr>                           
      <tr>
        <td>8:30-10:30</td>
        <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
        <td class="info">11</td> <td class="info">2</td>
        <td rowspan=3 style="vertical-align:middle;" class="info">3</td>
        <td rowspan=3 style="vertical-align:middle;" class="info">9</td>
      </tr>
      <tr>
        <td>10:30-12:00</td>
        <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
        <td rowspan=2 style="vertical-align:middle;" class="info">15</td>
        <td rowspan=2 style="vertical-align:middle;" class="info">1</td>
      </tr>
      <tr>
        <td>12:00-12:30</td>
        <td rowspan=2 style="vertical-align:middle;" colspan=2 class="info">7</td>
        <td rowspan=2 style="vertical-align:middle;" colspan=1 class="info">12</td>
        <td rowspan=2 style="vertical-align:middle;" colspan=1 class="info">8</td>
        <td rowspan=2 style="vertical-align:middle;" colspan=1 class="info">18</td>
        <td rowspan=2 style="vertical-align:middle;" colspan=1 class="info">11</td>
        <td rowspan=2 style="vertical-align:middle;" colspan=2 class="info">机关</td>
        <td rowspan=2 style="vertical-align:middle;" colspan=2 class="info">7</td>
      </tr>
      <tr>
        <td>12:30-13:00</td>
        <td rowspan=2 style="vertical-align:middle;" class="info">18</td>
        <td rowspan=2 style="vertical-align:middle;" class="info">8</td>
        <td rowspan=3 style="vertical-align:middle;" class="info">18</td>
        <td rowspan=2 style="vertical-align:middle;" class="info">17</td>
      </tr>
      <tr>
        <td>13:00-15:00</td>
        <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
      </tr>
      <tr>
        <td>15:00-17:00</td>
        <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
        <td class="info">12</td>
        <td class="info">机关</td>
        <td class="info">5</td>
      </tr>
      <tr>
        <td>17:00-19:45</td>
        <td class="info">15</td>
        <td class="info">3</td>
        <td class="info">机关</td>
        <td class="info">15</td>
        <td colspan=2 class="info">乒协</td>
        <td rowspan=2 style="vertical-align:middle;" class="info">11</td>
        <td class="info">12</td>
        <td colspan=2 class="info">所队</td>
        <td colspan=2 class="info">15</td>
        <td rowspan=2 style="vertical-align:middle;" class="info">2</td>
        <td rowspan=2 style="vertical-align:middle;" class="info">6</td>
      </tr>
      <tr>
        <td>19:45-22:00</td>
        <td colspan=2 class="info">5</td>
        <td colspan=2 class="info">所队</td>
        <td class="info">19</td>
        <td class="info">18</td>
        <td class="info">9</td>
        <td class="info">1</td>
        <td class="info">6</td>
        <td class="info">11</td>
        <td class="info">19</td>
      </tr>
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
})
</script>

</body>
</html>
