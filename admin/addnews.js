$(document).ready(function($) {
  $("#button_addnews").click(function(){
   $.post("addnews.php", {
     },function(){window.location.href='index.php';});
  });
});
