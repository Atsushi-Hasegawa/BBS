<?php

class Thread
{
  private $models;

  public function __construct()
  {
    $this->models = new BBS();
  }

  public function execute()
  {
    if(!isset($_POST['type']))
    {
      require_once(__DIR__ . "/../views/index.php");
      return $this->get_list();
    }
    else if($_POST['type'] === "create")
    {
      require_once(__DIR__ . "/../views/thread.php");
      return $this->create();
    }
    else if($_POST['type'] === "update")
    {
      require_once(__DIR__ . "/../views/thread.php");
      return $this->update();
    }
  }

  public function create()
  {
    $msg = "";
    if(empty($_POST['title'])) 
    {
      $msg = 'タイトルが入力されていません.';
    }
    else
    {
      $msg = $this->models->insert_thread($_POST['title']);
    }
    return $msg;
  }

  public function update()
  {
    if(empty($_POST['thread_id']) || empty($_POST['title']))
    {
      $msg = 'スレッドIDが入力されていません.';
    }
    else
    {
      $msg = $this->models->update_thread($_POST['title']);
    }
    return $msg;
  }

  public function get_list()
  {
    $thread_id = null;
    if(isset($_POST['thread_id']))
    {
      $thread_id = htmlspacialchars($_POST['thread_id']);
    }
    return $this->models->get_thread_list($thread_id);
  }
}
