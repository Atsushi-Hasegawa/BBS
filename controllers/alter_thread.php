<?php

class Alter_Thread
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
    $path = null;
    if(empty($_SESSION['user']))
    {
      return header("Location: http://localhost:8080/BBS/login");
    }
		$sw = isset($_GET['type'])? $_GET['type']: null;
    switch($sw)
 		{
			case "create":
				$msg = $this->create();
				$path = __DIR__ . "/../views/create.php";
				break;
			case "update":
				$msg = $this->update();
				$path = __DIR__ . "/../views/update.php";
				break;
			case "delete":
				$msg = $this->delete();
				$path = __DIR__ . "/../views/delete.php";
				break;
			default:
				$msg = 'type[操作]が入力されていません.';
				$path = __DIR__ . "/../views/index.php";
				break;
		}
    require_once($path);
		return $msg;
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
		$msg = "";
		if(empty($_POST['thread_id']) || empty($_POST['title']))
		{
			$msg = 'スレッドIDが入力されていません.';
		}
		else
    {
      $title = htmlspecialchars($_POST['title']);
      $thread_id = htmlspecialchars($_POST['thread_id']);
			$msg = $this->models->update_thread($thread_id, $title);
		}
		return $msg;
	}

	public function delete()
	{
		$msg = "";
		if(!empty($_POST['thread_id']))
		{
			$thread_id = htmlspecialchars($_POST['thread_id']);
			$msg = $this->models->delete($thread_id);
		}
		else 
		{
			$msg = "スレッドIDが入力されていません";
		}
		return $msg;
	}
}
