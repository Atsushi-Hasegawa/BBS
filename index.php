<?php

header('Content-Type: text/html; charset="UTF-8"');
require_once(__DIR__ . "/models/Thread.php");

$url = $_GET['url'];
$path = __DIR__ . "/controllers/${url}.php";
if(file_exists(__DIR__ . "/controllers/${url}.php"))
{
  require(__DIR__ . "/controllers/${url}.php");
}
else
{
  header("HTTP/1.1 404 Not Found");
  header("Location: http://192.168.33.12/BBS/404.html");
}

$controller = new $url();
$result = $controller->create();
echo $result;
