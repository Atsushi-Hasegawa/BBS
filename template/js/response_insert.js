
$(function() {
    $('#submit').click(function() {
      if(check_input() == true) {
      $.ajax({
             type: "POST",
             url: "http://localhost:8081/BBS/index.php?url=response&thread_id=" + $("#thread_id").val(),
             data:{"user":$("#user").val(), 
                   "comment":$("#comment").val(),
                   "url":$("#url").val(),
                   "type":$("#type").val(),
                   "thread_id":$("#thread_id").val()
              },
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

function check_input()
{
  var pattern = '/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/';
  var regexp = new RegExp(pattern);
  if($("#user").val() == '' || $("#comment").val() == '')
  {
    $("#alert").text("user,commentを入力してください");
    return false;
  } else if($("#user").val().length > 20)
  {
    $("#alert").text("userを20文字以内で入力してください");
    return false;
  }
  else if($('#url').val() != '' && $('#url').val().match(regexp) == null)
  {
    $("#alert").text("urlが正しく入力されていません");
    return false;
  }
  else
  {
    $("#alert").text('');
    return true;
  }
}
