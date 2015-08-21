<?php

header('Content-Type: text/html; charset="UTF-8"');
require_once(__DIR__ . "/models/bbs.php");
require_once(__DIR__ . "/libs/page.php");
require_once(__DIR__ . "/libs/security.php");

$url = $_GET['url'];
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$params = @explode("/" , $_GET["url"]);
$test  = ucwords(array_shift($params));
$thread_id = null;
$path = __DIR__ . "/controllers/${url}.php";
if(!is_file($path))
{
  header("HTTP/1.1 404 Not Found");
  header("Location: http://192.168.33.12/BBS/404.php");
}

$format_url = ucwords($url);
require_once($path);
$controller = new $format_url($page);
list($thread_list, $res_list) = $controller->execute();
if(is_array($thread_list) && is_array($res_list))
{
  echo "<br>id&ensp;title<br>";
  foreach($thread_list as $thread)
  {
    
    echo "<a href=index.php?url=thread&thread_id={$thread['id']}>{$thread['id']}</a>" . "&ensp;${thread['title']}<br>";
  }
  foreach($res_list as $res)
  {
    echo "{$res['res_id']}&ensp;{$res['user']}&ensp;<br>{$res['comment']}<br>";
  }
}

