<?php
require_once(__DIR__ . "/models/bbs.php");
require_once(__DIR__ . "/libs/page.php");
$title = "first submit!!!!!";
$bbs = new bbs();
$insert = $bbs->insert_thread($title);
$update = $bbs->update_thread(2,$title);
$user = "hoge";
$comment = "test";
$res = $bbs->insert_comment(2,$user, $comment);
$thread_list = $bbs->get_thread_list();
$res_list = $bbs->get_res_list(2);
$res_count = $bbs->get_res_num(1);
$thread_num = $bbs->get_thread_num(1, 10);

$res_page = ceil(count($res_list)/5);
Page::paging_res(2,$_GET['page'],$res_page);
$res_id_display_num = $bbs->get_res_num_by_page(2,$_GET['page'],10);
var_dump($res_id_display_num);

function paging($max, $page, $disp=5)
{
	if(empty($page))
	{
		$page = 1;
	}
	$page = max($page, 1);
  if($page > 1)
  {
    $start = (int)$page - 1;
   	print '<a href="?page='.$start.'">&laquo; prev</a>';
	}
  for($num = $page; $num < $max; $num++)
	{
		print '<a href="?page='.$num.'">'.$num.'</a>';
	}
  if ($max > $page)
  {
   $end = $page + 1; 
   print '<a href="?page='.$end.'">&laquo; next</a>';
  }
}
$thread_page = ceil(count($thread_list)/5);
//paging($thread_page, $_GET['page']);
$thread_num = $bbs->get_thread_num($_GET['page'], 5);
//var_dump($thread_num);
?>
