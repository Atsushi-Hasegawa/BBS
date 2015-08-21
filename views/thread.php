<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://192.168.33.12/BBS/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://192.168.33.12/BBS/css/bootstrap-theme.min.css">
    <script src=="https://192.168.33.12/BBS/js/bootstrap.min.js"></script>
    <H1>スレッド作成</H1>
  </head>
  <body>
  <form action="../index.php?url=alter_thread" method="post">
    タイトル:&ensp;<input type="text" name="title" size=30 maxlength="20" required><br>
    <input type="hidden" name="type" value="create"><br>
    <button class="btn btn-primary" type="submit">投稿</button>
  </form>
  <a href="http://192.168.33.11/BBS/index.php?page=1&url=thread">戻る</a>
  </body>
</html>
