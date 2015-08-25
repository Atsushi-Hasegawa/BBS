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
    print '<nav><ul class="pager">';
    if($page > 1)
    {
      $start = (int)$page - 1;
      print '<li><a href="index.php?url=thread&page='.$start.'"><span aria-hidden="true">&larr;</span> Previous</a></li>';
    }
    if ($max > $page)
    {
      $end = $page + 1; 
      print '<li><a href="index.php?url=thread&page='.$end.'">Next <span aria-hidden="true">&rarr;</span></a></li>';
    }
      print '</ul></nav>';
  }

  public static function paging_res($thread_id, $page, $max, $disp=5)
  {
    if(empty($page))
    {
      $page = 1;
    }
    $page = max($page, 1);
    print '<nav><ul class="pager">';
    if($page > 1)
    {
      $start = (int)$page - 1;
      print '<li><a href="index.php?url=thread&thread_id='.$thread_id.'&res_page='.$start.'"><span aria-hidden="true">&larr;</span> Previous</a></li>';
    }
    if ($max > $page)
    {
      $end = $page + 1; 
      print '<li><a href="index.php?url=thread&thread_id='.$thread_id.'&res_page='.$end.'">Next <span aria-hidden="true">&rarr;</span></a></li>';
    }
      print '</ul></nav>';
  }
}
