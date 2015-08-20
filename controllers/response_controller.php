<?php

require_once(__DIR__ . "/../views/response.php");
class response_controller
{
  private $models;

  public function __construct()
  {
    $this->models = new Thread();
  }

  public function execute()
  {
    if(!isset($_POST))
    {
      return $this->get_list();
    }
  }
  public function create()
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
      $msg = $this->models->create_comment($_POST['thread_id'], $_POST['user'], $_POST['comment']);
    }
    return $msg;
  }

  public function get_list()
  {
    if(empty($_POST['thread_id']) || !is_numeric($_POST['thread_id']))
    {
      $msg = "スレッドIDが入力されていません.";
    }
    else
    {
      $msg = $this->models->get_res_list($_POST['thread_id']);
    }
    return $msg;
  }
}
