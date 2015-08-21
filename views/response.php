<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" href="http://192.168.33.12/BBS/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://192.168.33.12/BBS/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://192.168.33.12/BBS/template/css/stylesheet.css">
    <meta charset='utf-8'>
    <div class="page-header center"><H1>コメント追加</H1></div>
  </head>
  <body>
    <div class="center">
      <form action="http://192.168.33.12/BBS/index.php?url=response&thread_id=<?php echo $_GET['thread_id'];?>" method="post">
        ユーザ名:&ensp;<input type="text" name="user" value="" size= 30 maxlength="20" required><br><br>
        コメント:&ensp;<input type="text" name="comment" value="" size=30 required><br><br>
        URL:&emsp;&emsp;&emsp;<input type="text" size=30 name="url" value=""><br><br>
        <input type="hidden" name="type" value="create"  required>
        <input type="hidden" name="thread_id" value="<?php echo $_GET['thread_id'];?>">
        <button class="btn btn-primary btn-lg" type="submit">投稿</button>
      </form><br>
      <H4><a href="http://192.168.33.12/BBS/index.php?url=thread">戻る</a></H4>
    </div>
  </body>
</html>
