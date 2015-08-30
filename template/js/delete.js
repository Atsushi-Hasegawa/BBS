function delete_thread()
{
  if(window.confirm('本当に削除してもよろしいですね?'))
  {
    $.ajax({
      type:"POST",
      url:"index.php?url=alter_thread&type=delete&thread_id="+ $("#thread_id").val(),
      data:{"thread_id":$("#thread_id").val(),
            "type":$("#type").val()
       },
       success: function(msg)
       {
         location.href =   "index.php?url=thread";
       }
    });
    return true;
  }
  else
  {
    return false;
  }
}
