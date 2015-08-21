<?php

require_once(__DIR__ . "/../views/index.php");
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
    if(!isset($_POST['type']))
    {
      if(!isset($_GET['thread_id']))
      {
        return array($this->get_list(), $this->display_thread_page());
      }
      else
      {
        $thread_id = htmlspecialchars($_GET['thread_id']);
        return array($this->models->get_thread_list($thread_id), array());
      }
    }
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
