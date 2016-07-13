$(document).ready(function($){
	$("#btnAddNews").click(function(){
	   $("#addNews").modal();
	     $("#year1").val('');
	     $("#month1").val('');
	     $("#day1").val('');
	     $("#hour1").val('');
	     $("#min1").val('');
	     $("#year2").val('');
	     $("#month2").val('');
	     $("#day2").val('');
	     $("#hour2").val('');
	     $("#min2").val('');
	     $("#newText").val('');
	     $("#submitNews").val("Add News");
	});

	function errchk(id, str){
		blank = '不能为空';
		alert(str + blank);
		$(id).focus();
		return false;
	}

        regYear=/^[12][0-9][0-9][0-9]$/
        regMonth=/^[1-9]$|^1[0-2]$|^0[1-9]$/
        regDay=/^[1-9]$|^[12][0-9]$|^3[01]|^0[1-9]$/
        regHour=/^[0-9]$|^1[0-9]$|^2[0-3]$|^0[0-9]$/
        regMin=/^[0-9]$|^[1-5][0-9]$|^0[0-9]$/
        regx=/^[1-9]$/
        regy=/^[0-9]$/
	$("#submitNews").click(function(){
              pass = {};

/////////////////////////////////////////////////
                var ii = 1;
		id = "#year"+ii;
		pass.year1 = $(id).val();
		if(pass.year1 == ''){
			return errchk(id, '年 ')
		}
                if(!regYear.test(pass.year1)){
                  alert("年份: 1000 ～ 2999");
		  $(id).val('');
		  $(id).focus();
		  return false;
                }

		id = '#month'+ii;
		pass.month1 = $(id).val();
		if(pass.month1 == ''){
			return errchk(id, '月 ');
		}
                if(!regMonth.test(pass.month1)){
                  alert("请输入有效的 月份");
		  $(id).val('');
		  $(id).focus();
		  return false;
                }
                if(regx.test(pass.month1)){
		  pass.month1 = "0"+$(id).val();
		  $(id).val(pass.month1);
                }

		id = '#day'+ii;
		pass.day1 = $(id).val();
		if(pass.day1 == ''){
			return errchk(id, '日 ');
		}
                if(!regDay.test(pass.day1)){
                  alert("请输入有效的 日期");
		  $(id).val('');
		  $(id).focus();
		  return false;
                }
                if(regx.test(pass.day1)){
		  pass.day1 = "0"+$(id).val();
		  $(id).val(pass.day1);
                }

		id = '#hour'+ii;
		pass.hour1 = $(id).val();
		if(pass.hour1 == ''){
			return errchk(id, '小时 ');
		}
                if(!regHour.test(pass.hour1)){
                  alert("请输入有效的 小时");
		  $(id).val('');
		  $(id).focus();
		  return false;
                }
                if(regy.test(pass.hour1)){
		  pass.hour1 = "0"+$(id).val();
		  $(id).val(pass.hour1);
                }

		id = '#min'+ii;
		pass.min1 = $(id).val();
		if(pass.min1 == ''){
			return errchk(id, '分钟 ');
		}
                if(!regMin.test(pass.min1)){
                  alert("请输入有效的 分钟");
		  $(id).val('');
		  $(id).focus();
		  return false;
                }
                if(regy.test(pass.min1)){
		  pass.min1 = "0"+$(id).val();
		  $(id).val(pass.min1);
                }
/////////////////////////////////////////////////
                ii = 2;
		id = "#year"+ii;
		pass.year2 = $(id).val();
		if(pass.year2 == ''){
			return errchk(id, '年 ')
		}
                if(!regYear.test(pass.year2)){
                  alert("年份: 1000 ～ 2999");
		  $(id).val('');
		  $(id).focus();
		  return false;
                }

		id = '#month'+ii;
		pass.month2 = $(id).val();
		if(pass.month2 == ''){
			return errchk(id, '月 ');
		}
                if(!regMonth.test(pass.month2)){
                  alert("请输入有效的 月份");
		  $(id).val('');
		  $(id).focus();
		  return false;
                }
                if(regx.test(pass.month2)){
		  pass.month2 = "0"+$(id).val();
		  $(id).val(pass.month2);
                }

		id = '#day'+ii;
		pass.day2 = $(id).val();
		if(pass.day2 == ''){
			return errchk(id, '日 ');
		}
                if(!regDay.test(pass.day2)){
                  alert("请输入有效的 日期");
		  $(id).val('');
		  $(id).focus();
		  return false;
                }
                if(regx.test(pass.day2)){
		  pass.day2 = "0"+$(id).val();
		  $(id).val(pass.day2);
                }

		id = '#hour'+ii;
		pass.hour2 = $(id).val();
		if(pass.hour2 == ''){
			return errchk(id, '小时 ');
		}
                if(!regHour.test(pass.hour2)){
                  alert("请输入有效的 小时");
		  $(id).val('');
		  $(id).focus();
		  return false;
                }
                if(regy.test(pass.hour2)){
		  pass.hour2 = "0"+$(id).val();
		  $(id).val(pass.hour2);
                }

		id = '#min'+ii;
		pass.min2 = $(id).val();
		if(pass.min2 == ''){
			return errchk(id, '分钟 ');
		}
                if(!regMin.test(pass.min2)){
                  alert("请输入有效的 分钟");
		  $(id).val('');
		  $(id).focus();
		  return false;
                }
                if(regy.test(pass.min2)){
		  pass.min2 = "0"+$(id).val();
		  $(id).val(pass.min2);
                }
/////////////////////////////////////////////////
		id = '#newText';
		pass.newText = $(id).val();
		if(pass.newText == ''){
			return errchk(id, '通知内容 ');
		}

		pass.submit = $("#submitNews").val();

		action = "news_add.php";
		$.post(action, pass, function(){
			location.reload();
		});
	});
});
