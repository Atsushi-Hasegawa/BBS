<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" href="http://192.168.33.12/BBS/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://192.168.33.12/BBS/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://192.168.33.12/BBS/template/css/stylesheet.css">
    <script src=="https://192.168.33.12/BBS/js/bootstrap.min.js"></script>
    <meta charset='utf-8'>
    <div class="page-header center"><H1>コメント追加</H1></div>
  </head>
  <body>
    <div class="center">
      <form action="http://192.168.33.12/BBS/index.php?url=response&thread_id=<?php echo $_GET['thread_id'];?>" method="post">
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
          <input type="text" name="user" value="" maxlength="20" placeholder="user" required><br><br>
        </div>
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
          <input type="text" name="comment" value="" placeholder="comment" required><br><br>
        </div>
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
          <input type="text" name="url" placeholder="url"><br><br>
        </div>
        <input type="hidden" name="type" value="create"  required>
        <input type="hidden" name="thread_id" value="<?php echo $_GET['thread_id'];?>">
        <button class="btn btn-primary btn-lg" type="submit">投稿</button>
      </form><br>
      <H4><a href="http://192.168.33.12/BBS/index.php?url=thread">戻る</a></H4>
    </div>
  </body>
</html>
