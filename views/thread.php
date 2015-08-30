<!DOCTYPE HTML>
<html>
  <head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="template/css/stylesheet.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="template/bootstrap/js/bootstrap.min.js"></script>
    <div class='page-header center'><H1>掲示板</H1> <H4><?php echo $_SESSION['user'] . "さんようこそ";?></H4></div>
  </head>
<body>
<div class="nav nav-pills">
<li role="presentation" class="active"><a href="index.php?url=thread">HOME</a></li>
<li role="presentation"><a href="index.php?url=alter_thread&type=create">記事作成</a></li>
<?php
  if(isset($_GET['thread_id']))
  {
    echo "<li role='presentation'><a href=index.php?url=response&thread_id={$_GET['thread_id']}>レス作成</a>";
  }
?>
<li role="presentation"><a href="index.php?url=logout">Logout</a></li>
</div>
<?php 
echo '<br>';
if(is_array($threads) && is_array($reses))
{
  echo '<div class="panel panel-default">';
  foreach($threads as $thread)
  {
    echo '<div class="panel-heading">';
    echo '<h4 class="panel-title">';
    echo "<a href=index.php?url=thread&thread_id={$thread['id']}>{$thread['id']}</a>" . "&ensp;${thread['title']}";
    echo '</h4>';
    echo '</div>';
  }
  echo '</div>';
  /** スレの修正 **/
  if(isset($_GET['thread_id']))
  {
    echo "<script src='template/js/update.js'></script>";
    echo "<input type='hidden' id='type' value='update'>";
    echo "<input type='hidden' id='thread_id' value=" . $_GET["thread_id"] . ">";
    echo "スレ名<br><input type='text' id='title' value='{$thread['title']}'><br>";
    echo '<input type="button" value="修正" onClick="update_thread()">';
    echo '<span id="update_alert"></span>';
  }
  /** スレの削除 **/
  if (isset($_GET['thread_id']))
  {
    echo "<script src='template/js/delete.js'></script>";
    echo "<input type='hidden' id='type' value='delete'>";
    echo "<input type='hidden' id='thread_id' value=" . $_GET["thread_id"] . ">";
    echo '<input type="button" value="削除" onClick="delete_thread()">';
  }
  echo '<div class="panel-body">';
  foreach($reses as $res)
  {
    echo '<ul class="list-group">';
    echo "<li class='list-group-item'>{$res['res_id']}&ensp;{$res['user']}&ensp;<br>{$res['comment']}";
    if (!empty($res['url']) && preg_match('/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $res['url']))
    {
      echo "<br><a href={$res['url']}>${res['url']}</a>";
    }
    if(!empty($res['image']))
    {
      echo "<br><img src='{$res['image']}' width=256 height=256>";
    }
    echo "</li></ul>";
  }
  echo '</div>';
}
?>
</body>
</html>
