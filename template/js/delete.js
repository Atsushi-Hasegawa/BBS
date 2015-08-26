$(function(){
  $('#submit').click(function() {
    $.ajax({
      type:"POST",
      url:"index.php?url=alter_thread&type=delete&thread_id="+ $("#thread_id").val(),
      data:{"thread_id":$("#thread_id").val(),
            "type":$("#type").val()
       },
      success: function(msg) {
        $("#delete_alert").text("¿¿¿¿¿¿¿¿¿");
      }
   });
 });
});
