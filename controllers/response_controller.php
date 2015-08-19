<?php

require_once(__DIR__ . "/../models/Thread.php");

class response_controller
{

  public static function create($models)
  {
    $msg = "";
    if(empty($_POST['thread_id']) || !is_numeric($_POST['thread_id']))
    { 
      $msg = "スレッドIDが入力されていません.";
    }
    else if(empty($_POST['user']))
    {
      $msg = "ユーザが入力されていません.";
    }
    else if(empty($_POST['comment']))
    {
      $msg = "コメントが入力されていません.";
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
      $msg = "スレッドIDが入力されていません.";
    }
    else
    {
      $msg = $models->get_res_list($_POST['thread_id']);
    }
    return $msg;
  }
}
