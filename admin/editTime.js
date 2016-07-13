$(document).ready(function($) {
    $(".time").click(function() {
     if($(this).children('input').length > 0)
       return;
     var td = $(this);
     var data = $(this).text();
     reg=/^0[0-9]:[0-5][0-9].0[0-9]:[0-5][0-9]$|^0[0-9]:[0-5][0-9].1[0-9]:[0-5][0-9]$|^0[0-9]:[0-5][0-9].2[0-3]:[0-5][0-9]$|^1[0-9]:[0-5][0-9].1[0-9]:[0-5][0-9]$|^1[0-9]:[0-5][0-9].2[0-3]:[0-5][0-9]$|^2[0-3]:[0-5][0-9].2[0-3]:[0-5][0-9]$/;
     $(this).html("");
     var input = $("<input type='text'>");
     input.val(data);
     input.css("background-color",$(this).css("background-color"));
     input.css("border-width","0px");
     input.css("width",$(this).css("width"));
     input.appendTo($(this));
     input.trigger("focus");
     input.trigger("select");  
     input.keydown(function(event){
       switch(event.keyCode){
       case 13:
         td.html($(this).val());
         if(!reg.test($(this).val())){
           alert("时间格式 XX:XX-XX:XX，小于 10 的数前面补 0。范围为 00:00 到 23:59，例如 08:00-10:30，10:30-12:00。");
           td.html("");
	   return false;
         }
         if(!$(this).val()){td.html("&nbsp;")}
         var tds = td.parent("tr").children("td");
         var x=["&nbsp;"];
         for (i=0; i < tds.length; i++){
           x[i]=tds.eq(i).text();
           if(!x[i]){x[i]="&nbsp;"}
         }
         if(tds.length < 5) {
         $.post("savenews.php", {
            id:x[0],date:x[1],news:x[2]
           },function(data){});
         }else{
         $.post("save.php", {
            id:x[0],time:x[1],d1a:x[2],d1b:x[3],
            d2a:x[4],d2b:x[5],d3a:x[6],d3b:x[7],
            d4a:x[8],d4b:x[9],d5a:x[10],d5b:x[11],
            d6a:x[12],d6b:x[13],d7a:x[14],d7b:x[15]
           },function(data){});
         }
         break;
       case 27:
         td.html(data);
         break;
       }
     }).blur(function(){
         td.html($(this).val());
         if(!reg.test($(this).val())){
           alert("时间格式 XX:XX-XX:XX，小于 10 的数前面补 0。范围为 00:00 到 23:59，例如 08:00-10:30，10:30-12:00。");
           td.html("");
	   return false;
         }
         if(!$(this).val()){td.html("&nbsp;")}
         var tds = td.parent("tr").children("td");
         var x=["&nbsp;"];
         for (i=0; i < tds.length; i++){
           x[i]=tds.eq(i).text();
           if(!x[i]){x[i]="&nbsp;"}
         }
         if(tds.length < 5) {
         $.post("savenews.php", {
            id:x[0],date:x[1],news:x[2]
           },function(data){});
         }else{
         $.post("save.php", {
            id:x[0],time:x[1],d1a:x[2],d1b:x[3],
            d2a:x[4],d2b:x[5],d3a:x[6],d3b:x[7],
            d4a:x[8],d4b:x[9],d5a:x[10],d5b:x[11],
            d6a:x[12],d6b:x[13],d7a:x[14],d7b:x[15]
           },function(data){});
         }
     });
    }); // click function
}); // ready function
