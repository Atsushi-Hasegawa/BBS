$(function() {
    $('#submit').click(function() {
      if(check_input() == true) {
      $.ajax({
             type: "POST",
             url: "http://localhost:8080/BBS/index.php?url=alter_thread&type=update",
             data:{"title":$("#title").val(), 
                   "type":$("#type").val(),
                   "thread_id":$("#thread_id").val()
              },
             success: function(msg) {
               $("#title").val('');
             },
             error: function(msg){
               console.log(msg);
             }
      });
      }
    });
});

function check_input()
{
  if($("#title").val() == '')
  {
    $("#title_alert").text("titleを入力してください");
    return false;
  } else if($("#title").val().length > 20)
  {
    $("#title_alert").text("titleを20文字以内で入力してください");
    return false;
  }
  else
  {
    $("#title_alert").text('');
    return true;
  }
}
