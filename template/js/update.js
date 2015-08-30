
function update_thread()
{
  if(check_input() == true) 
  {
    if(window.confirm("修正しますか?"))
    {
      $.ajax({
        type: "POST",
        url: "index.php?url=alter_thread&type=update",
        data:{
          "title":$("#title").val(), 
          "type":$("#type").val(),
          "thread_id":$("#thread_id").val()
        },
        success: function(msg)
        {
          location.href="index.php?url=thread";
        }
      });
      return true;
    }
    else
    {
      return false;
    }
  }
  else
  {
    return false;
  }
}

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
