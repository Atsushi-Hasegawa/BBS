<?php

class Page
{
	public static function paging_thread($page, $max, $disp=5)
	{
		if(empty($page))
		{
			$page = 1;
		}
		$page = max($page, 1);
		if($page > 1)
		{
			$start = (int)$page - 1;
			print '<a href="index.php?url=thread&page='.$start.'">&laquo; prev</a>';
		}
		for($num = $page; $num < $max; $num++)
		{
			print '<a href="index.php?url=thread&page='.$num.'">'.$num.'</a>';
		}
		if ($max > $page)
		{
			$end = $page + 1; 
			print '<a href="index.php?url=thread&page='.$end.'">&raquo; next</a>';
		}
	}

	public static function paging_res($thread_id, $page, $max, $disp=5)
	{
		if(empty($page))
		{
			$page = 1;
		}
		$page = max($page, 1);
		if($page > 1)
		{
			$start = (int)$page - 1;
			print '<a href="index.php?url=thread&thread_id='.$thread_id .'&res_page='.$start.'">&laquo; prev</a>';
		}
		for($num = $page; $num < $max; $num++)
		{
			print '<a href="index.php?url=thread&thread_id='.$thread_id.'&res_page='.$num.'">'.$num.'</a>';
		}
		if ($max > $page)
		{
			$end = $page + 1; 
			print '<a href="index.php?url=thread&thread_id='.$thread_id.'&res_page='.$end.'">&raquo; next</a>';
		}
	}

}
