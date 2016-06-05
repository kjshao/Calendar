$(document).ready(function($) {
  $("#button_add").click(function(){
   $.post("add.php", {
      id:'',time:'',d1a:'',d1b:'',
      d2a:'',d2b:'',d3a:'',d3b:'',
      d4a:'',d4b:'',d5a:'',d5b:'',
      d6a:'',d6b:'',d7a:'',d7b:''
     },function(){window.location.href='index.php';});
  });
});
