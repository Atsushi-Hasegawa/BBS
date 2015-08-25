<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" href="http://localhost:8080/BBS/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost:8080/BBS/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://localhost:8080/BBS/template/css/stylesheet.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="template/js/response_insert.js"></script>
    <meta charset='utf-8'>
    <div class="page-header center"><H1>コメント追加</H1></div>
  </head>
  <body>
    <div class="center">
        ユーザ名<br>
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
          <input class="form-control" type="text" name="user" id="user" placeholder="user" required>
        </div><br><br>
        コメント<br>
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
          <input class="form-control" type="text" name="comment" id="comment" placeholder="comment" required>
        </div><br><br>
        URL<br>
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
          <input class="form-control" type="text" name="url" id="url" placeholder="url">
        </div><br>
        <input type="hidden" id="type" name="type" value="create" required>
        <input type="hidden" id="thread_id" name="thread_id" value="<?php echo $_GET['thread_id'];?>"><br>
        <button class="btn btn-primary btn-lg" type="submit" id="submit">投稿</button><br>
      <H4><a href="http://localhost:8080/BBS/index.php?url=thread">戻る</a></H4>
      <font color="red"><span id="alert"></span></font>
    </div>
  </body>
</html>
