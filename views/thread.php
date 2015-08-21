<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://192.168.33.12/BBS/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://192.168.33.12/BBS/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://192.168.33.12/BBS/template/css/stylesheet.css">
    <script src=="https://192.168.33.12/BBS/js/bootstrap.min.js"></script>
    <div class="page-header center"><H1>スレッド作成</H1></div>
  </head>
  <body>
  <div class="center">
  <form action="../index.php?url=alter_thread" method="post">
    タイトル<br><input type="text" name="title" size=30 maxlength="20" required><br>
    <input type="hidden" name="type" value="create"><br>
    <button class="btn btn-primary btn-lg" type="submit">投稿</button>
  </form>
  <a href="http://192.168.33.12/BBS/index.php?page=1&url=thread">戻る</a>
  </div>
  </body>
</html>
