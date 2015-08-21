<?php

require_once(__DIR__ . "/../views/response.php");
class Response
{
  private $models;
  private $page;

  public function __construct($page)
  {
    $this->models = new BBS();
    $this->page = $page;
  }

  public function execute()
  {
    if(!isset($_POST['type']))
    {
      return $this->get_list();
    }
    else if($_POST['type'] === "create")
    {
      return $this->create();  
    }
  }

  public function create()
  {
    $msg = "";
    if(!isset($_POST['thread_id']) || empty($_POST['thread_id']) || !is_numeric($_POST['thread_id']))
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
      $msg = $this->models->insert_comment($_POST['thread_id'], $_POST['user'], $_POST['comment']);
    }
    return $msg;
  }

  public function get_list()
  {
    $msg = "";
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
