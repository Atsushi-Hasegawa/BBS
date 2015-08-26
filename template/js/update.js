$(function() {
    $('#submit').click(function() {
      if(check_input() == true) {
      $.ajax({
             type: "POST",
             url: "index.php?url=alter_thread&type=update",
             data:{"title":$("#title").val(), 
                   "type":$("#type").val(),
                   "thread_id":$("#thread_id").val()
              },
             success: function(msg) {
               $("#title").val('');
               $("#update_alert").text('スレッドの内容を修正しました');
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
    $("#update_alert").text("titleを入力してください");
    return false;
  } else if($("#title").val().length > 20)
  {
    $("#update_alert").text("titleを20文字以内で入力してください");
    return false;
  }
  else
  {
    $("#update_alert").text('');
    return true;
  }
}
