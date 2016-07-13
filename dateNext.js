$(document).ready(function($) {
  $("#button_next").click(function(){
    var days = {Mon:1, Tue:2, Wed:3, Thu:4, Fri:5, Sat:6, Sun:7};
    var x = $("#ntime").html();
    x = parseFloat(x) + 1;
    $("#ntime").html(x);
    var d0 = Date();
    var tmp = $.format.date(d0,'E');
    var today = days[tmp];
    var dtmp = Date.parse(d0);
    for (i=1; i<=7; i++) {
      if(i<today) {
        d1 = dtmp + 604800000/7*(x*7+i-today+7); // 604800000: 7 days in milliseconds
        var newDate = new Date(d1);
        tmp = $.format.date(newDate,'MM/dd');
        $("#day"+i).html(tmp);
      }else if(i>=today){
        d1 = dtmp + 604800000/7*(x*7+i-today);
        var newDate = new Date(d1);
        tmp = $.format.date(newDate,'MM/dd');
        $("#day"+i).html(tmp);
      }
    }
    ////////////////////////////////////////////////////
    // td
    var nrows = $("#nrows").html();
    var timeRow=[];
    for (i=1; i<=nrows; i++){
      timeRow[i] = $("#row"+i).html();
      //alert(timeRow[i]);
    }
    var nnews = $("#ntimeNew").html();
    var timeNewx=[];
    var timeNewy=[];
    for (i=0; i<=nnews; i++){
      timeNewx[i] = $("#timeNewx"+i).html();
      timeNewy[i] = $("#timeNewy"+i).html();
      //alert(timeNewx[i]+"and"+timeNewy[i]);
    }
    //
    var timeDay=[];
    for (i=1; i<=14; i++){
      timeDay[i] = $("#timeDay"+i).html();
      //alert(timeDay[i]);
    }
    for (i=1; i<=nrows; i++){
      for (j=1; j<=14; j++){
        var tdElement = $("#tdx"+i+"y"+j).html();
        var timeTd = parseFloat(timeDay[j]) + parseFloat(timeRow[i]) + parseFloat(604800*x);
        var flag = 0;
        for(k = 0; k<=nnews; k++){
          if(timeTd>=timeNewx[k] && timeTd<timeNewy[k]){flag=1;}
          //alert(timeTd+"-"+timeNewx[k]+"-"+timeNewy[k]);
        }
        if(flag==0){
          $("#tdx"+i+"y"+j+"x").removeClass();
          $("#tdx"+i+"y"+j+"x").addClass("info");
          $("#tdx"+i+"y"+j+"x").html(tdElement);
        }else if(flag==1){
          $("#tdx"+i+"y"+j+"x").removeClass();
          $("#tdx"+i+"y"+j+"x").addClass("danger");
          $("#tdx"+i+"y"+j+"x").html("/");
        }
      }
    }
    //////////////////////////////////////////////////////
  });
});
