<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://192.168.33.12/BBS/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://192.168.33.12/BBS/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://192.168.33.12/BBS/template/css/stylesheet.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://192.168.33.11/BBS/template/js/insert.js"></script>
    <script src=="https://192.168.33.12/BBS/js/bootstrap.min.js"></script>
    <div class="page-header center"><H1>スレッド作成</H1></div>
  </head>
  <body>
  <div class="center">
    タイトル<br>
    <div class="col-xs-6 col-md-4"></div>
    <div class="col-xs-6 col-md-4"><input type="text" class="form-control" id="title" name="title" size=30  required></div><br>
    <input type="hidden" name="type" id="type" value="create">
    <button class="btn btn-primary btn-lg" type="submit" id="submit">投稿</button><br>
  <a href="http://192.168.33.12/BBS/index.php?url=thread">戻る</a><br>
  <font color="red"><span id="title_alert"></span></font>
  </div>
  </body>
</html>
