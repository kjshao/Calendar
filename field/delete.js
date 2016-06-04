$(document).ready(function($){
  $("#button_delete").click(function(){
   var i=prompt("输入要删除的行号:","0");
   if(i != null) {
    $.post("delete.php", {
      id:i,time:'',d1a:'',d1b:'',
      d2a:'',d2b:'',d3a:'',d3b:'',
      d4a:'',d4b:'',d5a:'',d5b:'',
      d6a:'',d6b:'',d7a:'',d7b:''
     },function(){alert("删除时段")});
    }
    });
});
