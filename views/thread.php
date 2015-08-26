<!DOCTYPE HTML>
<html>
  <head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="template/css/stylesheet.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <div class='page-header center'><H1>掲示板</H1> <H4><?php echo $_SESSION['user'] . "さんようこそ";?></H4></div>
  </head>
<body>
<div class="nav nav-pills">
<li role="presentation" class="active"><a href="http://localhost:8081/BBS/index.php?url=thread">HOME</a></li>
<li role="presentation"><a href="index.php?url=alter_thread&type=create">記事作成</a></li>
<?php
  if(isset($_GET['thread_id']))
  {
    echo "<li role='presentation'><a href=index.php?url=response&thread_id={$_GET['thread_id']}>レス作成</a>";
    echo "<li role='presentation'><a href=index.php?url=alter_thread&type=delete&thread_id={$_GET['thread_id']}>スレッド削除</a>";
    echo "<li role='presentation'><a href=index.php?url=alter_thread&type=update&thread_id={$_GET['thread_id']}>スレッド修正</a>";  
  }
?>
<li role="presentation"><a href="index.php?url=logout">Logout</a></li>
</div>
</body>
</html>
