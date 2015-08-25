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
    $msg = "";
    if(empty($_SESSION['user']))
    {
      return header("Location: index.php?url=login");
    }
    if(isset($_POST['type']) && $_POST['type'] === "create")
    {
      $msg = $this->create();  
    }
    else
    {
      $msg = "type[操作]が入力されていません";
    }
    return $msg;
  }

  public function create()
  {
    $msg = "";
    if(!isset($_POST['thread_id']) && !is_numeric($_POST['thread_id']))
    { 
      $msg = "スレッドIDが入力されていません.";
    }
    else if(!isset($_POST['user']) && !is_string($_POST['user']))
    {
      $msg = "ユーザが入力されていません.";
    }
    else if(!isset($_POST['comment']) && !is_string($_POST['comment']))
    {
      $msg = "コメントが入力されていません.";
    }
    else
    {
      $msg = $this->models->insert_comment($_POST['thread_id'], $_POST['user'], $_POST['comment']);
    }
    return $msg;
  }
}
