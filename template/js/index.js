var name;
var passwd;
$(function() {
  $("#submit").click(function() {
    if(is_valid_user_info() == true)
    {
      $.ajax({
         type:"POST",
         url:"login",
         data:{"user":$("#user").val(),
               "passwd":$("#passwd").val()
         },
         success: function(data) {
           $("#user").val('');
           $("#passwd").val(''); 
         }
      });
    }
  });
});

function is_valid_user_info()
{
  if($("#user").val() == '' || $("#passwd").val() == '')
  {
    $("#login_alert").text("ログイン名、パスワードをしてください");
    return false;
  }
  else
  {
    $("#login_alert").text('');
    return true;
  }
}
