<?php

require_once(__DIR__ . "/../views/thread.php");
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
		if(isset($_POST['type']))
		{
			if($_POST['type'] === "create")
			{
				$msg = $this->create();
			}
			else if($_POST['type'] === "update")
			{
				$msg = $this->update();
			}
		}
		else
		{
			$msg = 'type[操作]が入力されていません.';
		}
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
			$msg = $this->models->update_thread($_POST['title']);
		}
		return $msg;
	}
}
