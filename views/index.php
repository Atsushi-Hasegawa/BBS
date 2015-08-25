<!DOCTYPE HTML>
<html>
  <head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="http://localhost:8080/BBS/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost:8080/BBS/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://localhost:8080/BBS/template/css/stylesheet.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="template/js/index.js"></script>
    <div class='page-header center'><H1>ログイン画面</H1></div>
  </head>
  <body>
  <div class="center">
  <form action="http://localhost:8080/BBS/index.php?url=login" method="post">
  ユーザ名<br>
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4">
    <input type="text" class="form-control" name="user" id="user" value="">
  </div><br><br>
  パスワード<br>
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4">
    <input type="text" class="form-control" name="passwd" id="passwd" value="">
  </div><br><br>
  <button class="btn btn-primary btn-lg" type="submit" id="submit">ログイン</button><br>
  </div>
  <form>
  </body>
</html>
