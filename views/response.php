<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" href="template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="template/css/stylesheet.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="template/bootstrap/js/bootstrap.min.js"></script>
    <meta charset='utf-8'>
    <div class="page-header center"><H1>コメント追加</H1></div>
  </head>
  <body>
    <div class="center">
    <form method="post" enctype="multipart/form-data" action="<?php echo 'index.php?url=response&thread?id=' . $_GET['thread_id'];?>">
      <div class="col-xs-6 col-md-4"></div>
      <div class="col-xs-6 col-md-4">
        <input class="form-control" type="hidden" name="user" id="user" value="<?php echo $_SESSION['user']; ?>" placeholder="user" required>
      </div><br>
      コメント<br>
      <div class="col-xs-6 col-md-4"></div>
      <div class="col-xs-6 col-md-4">
        <input class="form-control" type="text" name="comment" id="comment" placeholder="comment" required>
      </div><br><br>
      URL<br>
      <div class="col-xs-6 col-md-4"></div>
      <div class="col-xs-6 col-md-4">
        <input class="form-control" type="text" name="url" id="url" placeholder="url">
      </div><br><br>
      画像<br>
      <div class="col-xs-6 col-md-4"></div>
      <div class="col-xs-6 col-md-4">
        <input type="file" name="upfile" id="upfile" size="40" accept="image/jpeg,image/png" placeholder="Image File">
      </div><br>
        <input type="hidden" id="type" name="type" value="create" required>
        <input type="hidden" id="thread_id" name="thread_id" value="<?php echo $_GET['thread_id'];?>"><br>
        <button class="btn btn-primary btn-lg" type="submit" id="submit">投稿</button><br>
      </form>
      <H4><a href="index.php?url=thread">戻る</a></H4>
      <font color="red"><span id="alert"></span></font>
    </div>
  </body>
</html>
