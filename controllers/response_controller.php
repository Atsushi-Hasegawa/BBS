<?php

require_once(__DIR__ . "/../models/Thread.php");

class ThreadResponse
{
  public static function create()
  {
    if(empty($_POST['thread_id']) || !is_numeric($_POST['thread_id']))
    {
      return "$B%9%l%C%I(BID$B$,F~NO$5$l$F$$$^$;$s(B.";
    }
    else if(empty($_POST['user']))
    {
      return "$B%f!<%6$,F~NO$5$l$F$$$^$;$s(B.";
    }
    else if(empty($_POST['comment']))
    {
      return "$BK\J8$,F~NO$5$l$F$$$^$;$s(B.";
    }
    return Thread::create_comment($_POST['thread_id'], $_POST['user'], $_POST['comment']);
  }

  public static function get_list()
  {
    if(empty($_POST['thread_id']) || !is_numeric($_POST['thread_id']))
    {
      return "$B%9%l%C%I(BID$B$,F~NO$5$l$F$$$^$;$s(B.";
    }
    return Thread::get_res_list($_POST['thread_id']);
  }
}
