<?php

class Thread
{
  private $models;
  private $page;
  private $disp_num = 10;

  public function __construct($page)
  {
    $this->models = new BBS();
    $this->page = $page;
  }

  public function execute()
  {
    if(!isset($_POST['type']) && !isset($_GET['thread_id']))
    {
      require_once(__DIR__ . "/../views/index.php");
      return array($this->get_list(), $this->display_thread_page());
    }
    else if(!isset($_POST['type']) && isset($_GET['thread_id']))
    {
      $thread_id = htmlspecialchars($_GET['thread_id']);
      return array($this->models->get_thread_list($thread_id), array());
    }
    else if(isset($_POST['type']) && $_POST['type'] === "create")
    {
      require_once(__DIR__ . "/../views/thread.php");
      return $this->create();
    }
    else if(isset($_POST['type']) && $_POST['type'] === "update")
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
    $thread_list = $this->models->get_thread_list($thread_id);
    return $this->models->get_thread_num($this->page, $this->disp_num);
  }

  public function display_thread_page()
  {
    $thread_id = null;
    if(isset($_POST['thread_id']))
    {
      $thread_id = htmlspacialchars($_POST['thread_id']);
    }
    $thread_list = $this->models->get_thread_list($thread_id);
    $max = ceil(count($thread_list)/$this->disp_num);
    return Page::paging($this->page, $max);
  }
}
