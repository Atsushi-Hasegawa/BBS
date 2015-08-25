
$(function() {
    $('#submit').click(function() {
      if(check_input() == true) {
      $.ajax({
             type: "POST",
             url: "http://localhost:8080/BBS/index.php?url=response&thread_id=" + $("#thread_id").val(),
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
             }
      });
      }
    });
});

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
