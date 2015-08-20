<!DOCTYPE HTML>
<html>
<head>
<meta charset='utf-8'>
コメント追加
</head>
<body>
<form action="index.php?url=response" method="post">
  ユーザ名:&ensp;<input type="text" name="user" value="" size= 30 maxlength="20" required><br>
  コメント:&ensp;<input type="text" name="comment" value="" size=30 required><br>
  URL:&ensp;&ensp;&ensp;&ensp;&ensp;<input type="text" size=30 name="url" value=""><br>
  <input type="hidden" name="type" value="create"  required>
  <input type="hidden" name="thread_id" value="1">
  <button type="submit">投稿</button>
</form>
</body>
</html>
