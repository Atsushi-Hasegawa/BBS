<?php

require_once(__DIR__ . "/../models/Thread.php");

class response_controller
{

  public static function create($models)
  {
    $msg = "";
    if(empty($_POST['thread_id']) || !is_numeric($_POST['thread_id']))
    { 
      $msg = "$B%9%l%C%I(BID$B$,F~NO$5$l$F$$$^$;$s(B.";
    }
    else if(empty($_POST['user']))
    {
      $msg = "$B%f!<%6$,F~NO$5$l$F$$$^$;$s(B.";
    }
    else if(empty($_POST['comment']))
    {
      $msg = "$BK\J8$,F~NO$5$l$F$$$^$;$s(B.";
    } 
    else
    {
      $msg = $models->create_comment($_POST['thread_id'], $_POST['user'], $_POST['comment']);
    }
    return $msg;
  }

  public static function get_list($models)
  {
    if(empty($_POST['thread_id']) || !is_numeric($_POST['thread_id']))
    {
      $msg = "$B%9%l%C%I(BID$B$,F~NO$5$l$F$$$^$;$s(B.";
    }
    else
    {
      $msg = $models->get_res_list($_POST['thread_id']);
    }
    return $msg;
  }
}
