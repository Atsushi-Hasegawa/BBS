<?php

header('Content-Type: text/html; charset="UTF-8"');
require_once(__DIR__ . "/models/bbs.php");
require_once(__DIR__ . "/libs/page.php");
require_once(__DIR__ . "/libs/security.php");

$url = $_GET['url'];
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$thread_id = null;
/*if(isset($_GET['thread_id']))
{
  $thread_id = $_GET['thread_id'];
}*/
$path = __DIR__ . "/controllers/${url}.php";
if(!is_file($path))
{
  header("HTTP/1.1 404 Not Found");
  header("Location: http://192.168.33.12/BBS/404.php");
}

$format_url = ucwords($url);
require_once($path);
$controller = new $format_url($page);
list($results, $display) = $controller->execute();
if(is_array($results))
{
  echo "<br>id&ensp;title<br>";
  foreach($results as $result)
  {
    
    echo "<a href=index.php?url=thread&thread_id={$result['id']}>{$result['id']}</a>" . "&ensp;${result['title']}<br>";
  }
}

