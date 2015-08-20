<!DOCTYPE HTML>
<html>
  <head>
    <meta charset='utf-8'>
    <title>掲示板</title>
    <link rel="stylesheet" href="http://192.168.33.12/BBS/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://192.168.33.12/BBS/css/bootstrap-theme.min.css">
    <script src=="https://192.168.33.12/BBS/js/bootstrap.min.js"></script>
  </head>
<body>
<a href="views/thread.php">記事作成</a>
<?php
if (isset($_GET['thread_id']))
{
  echo "<form action='' method='post'>";
  echo "<input type=hidden name='thread_id' value={$_GET['thread_id']}";
  echo "</form>";
}
?>
#記事の修正リンクをはる
</body>
</html>
