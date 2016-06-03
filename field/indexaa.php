<!DOCTYPE html>
<html>
<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "demo";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<head>
 <title>可编辑表格</title>
 <script type="text/javascript" src="jquery.min.js"></script>
 <style type="text/css">
    body{
      font-size:12px;
      background:#eee;
      text-align:center;
    }
    table{
      width:600px;
      border:1px solid #050;
      border-collapse:collapse;
    }
    tr,td{
      border:1px solid #050;
      width:120px;
    }
 </style>
</head>
<body>
   <table>
     <tr>
      <td>编号</td>
      <td>姓名</td>
      <td>年龄</td>
      <td>性别</td>
      <td>邮箱</td>
     </tr>
     <?php
      class TableRows extends RecursiveIteratorIterator { 
          function __construct($it) { 
              parent::__construct($it, self::LEAVES_ONLY); 
          }
      
          function current() {
              return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
          }
      
          function beginChildren() { 
              echo "<tr>"; 
          } 
      
          function endChildren() { 
              echo "</tr>" . "\n";
          } 
      } 

      $stmt = $pdo->prepare("SELECT id, name, age, sex, email FROM users"); 
      $stmt->execute();
      $row = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { echo $v;}
    ?>
<?php 
  $pdo=null;
?>   
<script>
 $(document).ready(function(){
   //不存在id的行加click事件
   $("tr td:not(.id)").click(function(){
     //alert($(this).text());
     if($(this).children('input').length > 0)
       return;
     //取现表格中原有的内容
     var data = $(this).text();
     //将内容设置为空
     $(this).html("");
     //保留编辑表格
     var td = $(this);
     //创建一个文本输入框
     var input = $("<input type='text'>");
     //将单元格的内容复制到input 文件框中
     input.val(data);
     //input 背景设定
     input.css("background-color",$(this).css("background-color"));
     input.css("border-width","0px");
     input.css("width",$(this).css("width"));
     //在表格中放一个input表单  $(this) 单元格
     input.appendTo($(this));
     //表单放入表格后触发焦点事件
     input.trigger("focus");
     //全选内容
     input.trigger("select");  

     //-----------------------------
     //添加键盘事件
     input.keydown(function(event){
       switch(event.keyCode){
       //回车
       case 13:
         td.html($(this).val());
         //利用AJAX将数据传给服务器
         //获取一行所有列的对象
         var tds = td.parent("tr").children("td");
         var i = tds.eq(0).text();
         var n = tds.eq(1).text();
         var a = tds.eq(2).text();
         var s = tds.eq(3).text();
         var e = tds.eq(4).text();
         //var user={id:i,name:n,age:a,sex:s,email:e}
         $.post("save.php",{id:i,name:n,age:a,sex:s,email:e},function(data){
           //alert(data);
         });
         break;
       case 27:
         td.html(data);
         break;
       }
       //又添加了失去焦点事件
       }).blur(function(){
         td.html($(this).val());
         //利用AJAX将数据传给服务器
         var tds = td.parent("tr").children("td");
         var i = tds.eq(0).text();
         var n = tds.eq(1).text();
         var a = tds.eq(2).text();
         var s = tds.eq(3).text();
         var e = tds.eq(4).text();
         //var user={id:i,name:n,age:a,sex:a,email:e}
         $.post("save.php",{id:i,name:n,age:a,sex:s,email:e},function(data){
           //alert(data);
         });
       });
   });
 });
</script>     
</body>
</html>
