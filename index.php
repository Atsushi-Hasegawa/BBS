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
  header("Location: 404.php");
}

$format_url = ucwords($url);
require_once($path);
$controller = new $format_url($page);
list($thread_list, $res_list) = $controller->execute();

