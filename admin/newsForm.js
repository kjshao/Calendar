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

	$("#submitNews").click(function(){
		pass = {};

		id = "#year1";
		pass.year1 = $(id).val();
		if(pass.year1 == ''){
			return errchk(id, '年 ')
		}

		id = '#month1';
		pass.month1 = $(id).val();
		if(pass.month1 == ''){
			return errchk(id, '月 ');
		}

		id = '#day1';
		pass.day1 = $(id).val();
		if(pass.day1 == ''){
			return errchk(id, '日 ');
		}

		id = '#hour1';
		pass.hour1 = $(id).val();
		if(pass.hour1 == ''){
			return errchk(id, '小时 ');
		}

		id = '#min1';
		pass.min1 = $(id).val();
		if(pass.min1 == ''){
			return errchk(id, '分钟 ');
		}

		id = "#year2";
		pass.year2 = $(id).val();
		if(pass.year2 == ''){
			return errchk(id, '年 ')
		}

		id = '#month2';
		pass.month2 = $(id).val();
		if(pass.month2 == ''){
			return errchk(id, '月 ');
		}

		id = '#day2';
		pass.day2 = $(id).val();
		if(pass.day2 == ''){
			return errchk(id, '日 ');
		}

		id = '#hour2';
		pass.hour2 = $(id).val();
		if(pass.hour2 == ''){
			return errchk(id, '小时 ');
		}

		id = '#min2';
		pass.min2 = $(id).val();
		if(pass.min2 == ''){
			return errchk(id, '分钟 ');
		}

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
