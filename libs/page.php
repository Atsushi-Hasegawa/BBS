<?php

class Page
{
	public static function paging($page, $max, $disp=5)
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
}
