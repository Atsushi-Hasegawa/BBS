<?php

header('Content-Type: text/html; charset="UTF-8"');
require_once(__DIR__ . "/models/Thread.php");

$url = $_GET['url'];
$path = __DIR__ . "/controllers/${url}.php";
if(!is_file($path))
{
  header("HTTP/1.1 404 Not Found");
  header("Location: http://192.168.33.11/BBS/404.php");
}

require_once($path);
$controller = new $url;
$result = $controller->execute;
//echo $result;
