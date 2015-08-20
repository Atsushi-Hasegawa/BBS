<?php

require_once(__DIR__ . "/../views/thread.php");
class thread_controller
{
  private models;

  public function __construct()
  {
    $this->models = new Thread();
  }
  public function execute()
  {
    if(!isset($_POST))
    {
      return $this->get_list($models);
    }
  }

  public function create()
  {
    $msg = ''
    if(empty($_POST['title']) 
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

  public function get_list($thread_id = null)
  {
    /*if(empty($_POST['thread_id']) && !is_numeric($_POST['thread_id']))
    {
      return $models->get_thread_list();
    } 
    else
    {*/
      return $this->models->get_thread_list($thread_id);
    //}
  }
}
