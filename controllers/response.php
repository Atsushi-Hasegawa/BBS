<?php

require_once(__DIR__ . "/../views/response.html");
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
      $msg = 'type[操作]が入力されていません';
    }
    return $msg;
  }

  public function create()
  {
    $msg = "";
    if(!isset($_POST['thread_id']) && !is_numeric($_POST['thread_id']))
    { 
      $msg = 'スレッドIDが入力されていません.';
    }
    else if(!isset($_POST['user']) && !is_string($_POST['user']))
    {
      $msg = 'ユーザが入力されていません.';
    }
    else if(!isset($_POST['comment']) && !is_string($_POST['comment']))
    {
      $msg = 'コメントが入力されていません.';
    }
    else
    {
      $thread_id = htmlspecialchars($_POST['thread_id']);
      $user = htmlspecialchars($_POST['user']);
      $comment = htmlspecialchars($_POST['comment']);
      $url = htmlspecialchars($_POST['url']);
      $image = null;
      if(!empty($_FILES['upfile']['tmp_name']))
      {
        $image = htmlspecialchars($this->upload_img());
      }
      $msg = $this->models->insert_comment($thread_id, $user, $comment,$url, $image);
    }
    return $msg;
  }

  public function upload_img()
  {
    $file_path = "";
    try {
      if(!is_uploaded_file($_FILES['upfile']['tmp_name']))
      {
        throw new Exception('ファイルが選択されませんでした');
      }
      $file_path = "files/" . htmlspecialchars($_FILES['upfile']['name']);
      if(!move_uploaded_file($_FILES['upfile']['tmp_name'], $file_path))
      {
        throw new Exception('ファイルをアップロードできませんでした');
      }
      chmod($file_path, 0644);
      return $file_path;
    } catch(Exception $e)
      {
        echo $e->getMessage();
        return $file_path;
      }
  }
}
