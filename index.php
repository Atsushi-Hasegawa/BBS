<?php

header('Content-Type: text/html; charset="UTF-8"');
require_once(__DIR__ . "/models/bbs.php");
require_once(__DIR__ . "/models/user.php");
require_once(__DIR__ . "/libs/page.php");
require_once(__DIR__ . "/libs/security.php");

session_start();
session_regenerate_id(true);
$url = $_GET['url'];
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$params = @explode("/" , $_GET["url"]);
$test  = ucwords(array_shift($params));
$thread_id = null;
$path = __DIR__ . "/controllers/${url}.php";
if(!is_file($path))
{
  header("HTTP/1.1 404 Not Found");
  header("Location: http://localhost:8081/BBS/404.php");
}

$format_url = ucwords($url);
require_once($path);
$controller = new $format_url($page);
list($thread_list, $res_list) = $controller->execute();
echo '<br>';
if(is_array($thread_list) && is_array($res_list))
{
  echo '<div class="panel panel-default">';
  foreach($thread_list as $thread)
  {
    echo '<div class="panel-heading">';
    echo '<h4 class="panel-title">';
    echo "<a href=index.php?url=thread&thread_id={$thread['id']}>{$thread['id']}</a>" . "&ensp;${thread['title']}";
    echo '</h4>';
    echo '</div>';
  }
  echo '<div class="panel-body">';
  foreach($res_list as $res)
  {
    echo '<ul class="list-group">';
    echo "<li class='list-group-item'>{$res['res_id']}&ensp;{$res['user']}&ensp;<br>{$res['comment']}</li>";
    echo "</ul>";
  }
  echo "</div>";
  echo '</div>';
}

