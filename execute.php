<?php
require_once(__DIR__ . "/models/Thread.php");

$title = "first submit!!!!!";
$bbs = new Thread();
$insert = $bbs->insert_thread($title);
$update = $bbs->update_thread(2,$title);
$user = "hoge";
$comment = "test";
$res = $bbs->insert_comment(2,$user, $comment);
$thread_list = $bbs->get_thread_list(2);
$res_list = $bbs->get_res_list(2);
$res_count = $bbs->get_res_num(1);
var_dump($insert, $update, $res, $res_list, $res_count);
?>
