$(function(){
  $('#submit').click(function() {
    $.ajax({
      type:"POST",
      url:"http://localhost:8080/BBS/index.php?url=alter_thread&type=delete&thread_id="+ $("#thread_id").val(),
      data:{"thread_id":$("#thread_id").val(),
            "type":$("#type").val()
       },
      success: function(msg) {
        $("#delete_alert").text(msg + "¿¿¿¿¿¿¿");
      }
   });
 });
});
