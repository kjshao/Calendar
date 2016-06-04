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
