$(function(){
  $('#submit').click(function() {
    $.ajax({
      type:"POST",
      url:"http://192.168.33.12/BBS/index.php?url=alter_thread&type=delete&thread_id="+ $("#thread_id").val(),
      data:{"thread_id":$("#thread_id").val(),
            "type":$("#type").val()
       },
      success: function(msg) {
        $("#delete_alert").text(msg + "íœ‚µ‚Ü‚µ‚½");
      }
   });
 });
});
