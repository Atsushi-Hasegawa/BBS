<!DOCTYPE HTML>
<html>
<head>
<meta charset='utf-8'>
コメント追加
</head>
<body>
<form action="http://192.168.33.11/BBS/index.php?url=response&thread_id=<?php echo $_GET['thread_id'];?>" method="post">
  ユーザ名:&ensp;<input type="text" name="user" value="" size= 30 maxlength="20" required><br>
  コメント:&ensp;<input type="text" name="comment" value="" size=30 required><br>
  URL:&ensp;&ensp;&ensp;&ensp;&ensp;<input type="text" size=30 name="url" value=""><br>
  <input type="hidden" name="type" value="create"  required>
  <input type="hidden" name="thread_id" value="<?php echo $_GET['thread_id'];?>">
  <button type="submit">投稿</button>
</form>
<H4><a href="http://192.168.33.11/BBS/index.php?url=thread">戻る</a></H4>
</body>
</html>
