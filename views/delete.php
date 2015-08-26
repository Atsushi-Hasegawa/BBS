<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="template/css/stylesheet.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="template/js/delete.js"></script>
    <div class="page-header center">スレッドの削除</div>
   </head>
   <body>
   <div class="center">
    <input type="hidden" id="type" value="delete">
    <input type="hidden" id="thread_id" value="<?php echo $_GET['thread_id'];?>">
    <button type="submit"class="btn btn-lg btn-primary" id="submit">削除</button><br><br>
    <font color="red"><span id="delete_alert"></span></font><br>
    <a href="http://localhost:8081/BBS/index.php?url=thread">戻る</a>
   </div>
  </body>
</html>
