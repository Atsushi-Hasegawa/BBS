<?php

require_once(__DIR__ . "/../models/Thread.php");

class ThreadController
{
  public function create()
  {
    $msg = ''
    if(empty($_POST['title']) 
    {
      $msg = 'タイトルが入力されていません.';
    }
    $msg = Thread::insert_thread($_POST['title']);
    return $msg;
  }

  public function update()
  {
    if(empty($_POST['thread_id']) || empty($_POST['title']))
    {
      $msg = 'スレッドIDが入力されていません';
    }
    $msg = Thread::update_thread($_POST['title']);
    return $msg;
  }

  public function getList($thread_id = null)
  {
    if(empty($_POST['thread_id']) && !is_numeric($_POST['thread_id']))
    {
      return Thread::get_thread_list();
    } 
    else
    {
      return Thread::get_thread_list($thread_id);
    }
  }
}
