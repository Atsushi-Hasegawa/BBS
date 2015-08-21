<!DOCTYPE HTML>
<html>
  <head>
    <meta charset='utf-8'>
    <title>掲示板</title>
    <link rel="stylesheet" href="http://192.168.33.12/BBS/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://192.168.33.12/BBS/css/bootstrap-theme.min.css">
    <script src=="http://192.168.33.12/BBS/js/bootstrap.min.js"></script>
  </head>
<body>
<a href="http://192.168.33.11/BBS/views/thread.php">記事作成</a>
#記事の修正リンクをはる
<?php
  if(isset($_GET['thread_id']))
  {
    echo "<a href=http://192.168.33.11/BBS/views/response.php?thread_id={$_GET['thread_id']}>レス作成</a>";
  }
?>
</body>
</html>
