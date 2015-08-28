<!DOCTYPE HTML>
<html>
  <head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="template/css/stylesheet.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="template/bootstrap/js/bootstrap.min.js"></script>
    <script src="template/js/add_user.js"></script>
    <div class='page-header center'><H1>新規登録</H1></div>
  </head>
  <body>
  <div class="center">
  ユーザ名<br>
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4">
    <input type="text" class="form-control" name="user" id="user" value="">
  </div><br><br>
  パスワード<br>
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4">
    <input type="text" class="form-control" name="passwd" id="password" value="">
  </div><br><br>
  <button class="btn btn-primary btn-lg" type="submit" id="submit">登録</button><br>
	<span id="alert"></span>
	<div class='center'><H4><a href="index.php?url=login">戻る</a></H4></div>
	</div>
  </body>
</html>
