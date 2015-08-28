$(function() {
    $('form').submit(function(e) {
      e.preventDefault();

      if(check_input() == true) {
      var file = new FormData($(this)[0]);
      console.log(file);
      $.ajax({
        type: "POST",
        url: "index.php?url=response&thread_id=" + $("#thread_id").val(),
        processData:false,
        contentType:false,
        mimeType:"multipart/form-data",
        data:{
          "user":$("#user").val(), 
          "comment":$("#comment").val(),
          "url":$("#url").val(),
          "type":$("#type").val(),
          "thread_id":$("#thread_id").val(),
          "upfile":file
        },
        success: function(msg) {
          $("#user").val('');
          $("#comment").val('');
          $("#url").val('');
          $('form').find(':submit').attr('disabled', true);
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
