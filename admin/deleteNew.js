$(document).ready(function($){
   $('#confirmDelete').on('show.bs.modal', function (e) {
	   $id = $(e.relatedTarget).attr('data-id');
	   $count = $(e.relatedTarget).attr('data-count');
	   $(this).find('.modal-body p').text('确定删除编号为\''+$count+'\'的通知?');
	   $(this).find('.modal-title').text('删除');
	   $(this).find('.modal-val').text($id);
	});

	$('#confirmDelete').find('.modal-footer #confirm').on('click', function(e){
	   i = $('#confirmDelete').find('.modal-val').text();

	   if(i != null) {
	    $.post("deleteNew.php", {
	      id:i
	      },function(){window.location.href='index.php';});
	   }
	});
});
