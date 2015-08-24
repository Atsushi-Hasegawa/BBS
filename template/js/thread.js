var response;
$(function() {
  $.ajax
  ({
    type: "GET",
    url: "index.php?url=thread",
    success: function(msg)
    {
      response = msg;
      get_thread_data();
    }
  });
});

function get_thread_data()
{
  var data = response;
  if(data.result == '')
  {
    $("#disp_thread").html("該当のデータはありません");
  }
  else 
  {
    var disp_thread = "<div class='panel panel-default'>";
    var thread = data['result'];
    for(var i  in thread)
    {
      disp_thread += "<div class='panel-heading'>";
      disp_thread += "<h4 class='panel-title'>";
      disp_thread += "<a href=index.php?url=thread&thread_id=" + thread[i].id + ">" + thread[i].id + "</a>" + "&ensp;" + thread[i].title;
      disp_thread += "<h4>";
      disp_thread += "</div>";
    }
      disp_thread += "</div>";
    $("#disp_thread").html(disp_thread);
  }
}
