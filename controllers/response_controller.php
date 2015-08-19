<?php

require_once(__DIR__ . "/../models/Thread.php");

class ThreadResponse
{
  public static function create()
  {
    if(empty($_POST['thread_id']) || !is_numeric($_POST['thread_id']))
    {
      return "スレッドIDが入力されていません.";
    }
    else if(empty($_POST['user']))
    {
      return "ユーザが入力されていません.";
    }
    else if(empty($_POST['comment']))
    {
      return "本文が入力されていません.";
    }
    return Thread::create_comment($_POST['thread_id'], $_POST['user'], $_POST['comment']);
  }

  public static function get_list()
  {
    if(empty($_POST['thread_id']) || !is_numeric($_POST['thread_id']))
    {
      return "スレッドIDが入力されていません.";
    }
    return Thread::get_res_list($_POST['thread_id']);
  }
}
