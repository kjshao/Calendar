$(document).ready(function($){
  $("#button_deletenews").click(function(){
   var i=prompt("输入要删除的行号","0");
   if(i != null) {
    $.post("deletenews.php", {
      id:i
     },function(){window.location.href='index.php';});
    }
    });
});
