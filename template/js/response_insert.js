
$(function() {
	$('#submit').click(function() {
      if(check_input() == true) {
      console.log($("#response").get(0));
			var file = new FormData($("#response").get()[3]);
			$.ajax({
             type: "POST",
             url: "index.php?url=response&thread_id=" + $("#thread_id").val(),
             data:{"user":$("#user").val(), 
                   "comment":$("#comment").val(),
                   "url":$("#url").val(),
                   "type":$("#type").val(),
                   "thread_id":$("#thread_id").val(),
                   "upfile":file
              },
							processData:false,
							contentType:false,
             success: function(msg) {
               $("#user").val('');
               $("#comment").val('');
               $("#url").val('');
               $("#alert").text('コメントを投稿しました');
             }
      });
      }
    });
});

function select_image_file()
{
	$('.open-file-dialog').on('click', function() {
		  $(this).next('input[type="file"]').trigger('click');
	});

	$('.file').change(function() {
		  $(this).closest('.form-group').find('.file-text').val($(this).val());
	});
}
function check_input()
{
  if($("#user").val() == '' || $("#comment").val() == '')
  {
    $("#alert").text("user,commentを入力してください");
    return false;
  } else if($("#user").val().length > 20)
  {
    $("#alert").text("userを20文字以内で入力してください");
    return false;
  }
  else
  {
    $("#alert").text('');
    return true;
  }
}
