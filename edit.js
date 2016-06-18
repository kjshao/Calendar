$(document).ready(function($) {
    $(".table td").click(function() {
     if($(this).children('input').length > 0)
       return;
     var td = $(this);
     var data = $(this).text();
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
         if(!$(this).val()){td.html("&nbsp;")}
         var tds = td.parent("tr").children("td");
         var x=["&nbsp;"];
         for (i=0; i < tds.length; i++){
           x[i]=tds.eq(i).text();
           if(!x[i]){x[i]="&nbsp;"}
         }
         $.post("save.php", {
            id:x[0],time:x[1],d1a:x[2],d1b:x[3],
            d2a:x[4],d2b:x[5],d3a:x[6],d3b:x[7],
            d4a:x[8],d4b:x[9],d5a:x[10],d5b:x[11],
            d6a:x[12],d6b:x[13],d7a:x[14],d7b:x[15]
           },function(data){});
         break;
       case 27:
         td.html(data);
         break;
       }
     }).blur(function(){
         td.html($(this).val());
         if(!$(this).val()){td.html("&nbsp;")}
         var tds = td.parent("tr").children("td");
         var x=["&nbsp;"];
         for (i=0; i < tds.length; i++){
           x[i]=tds.eq(i).text();
           if(!x[i]){x[i]="&nbsp;"}
         }
         $.post("save.php", {
            id:x[0],time:x[1],d1a:x[2],d1b:x[3],
            d2a:x[4],d2b:x[5],d3a:x[6],d3b:x[7],
            d4a:x[8],d4b:x[9],d5a:x[10],d5b:x[11],
            d6a:x[12],d6b:x[13],d7a:x[14],d7b:x[15]
           },function(data){});
     });
    }); // click function
}); // ready function
