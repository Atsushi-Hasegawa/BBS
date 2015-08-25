<?php

require_once(__DIR__ . "/../views/thread.php");
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
    if(empty($_SESSION['user']))
    {
      return header("Location: http://localhost:8080/BBS/login");
    }
		if(!isset($_POST['type']))
		{
			if(!isset($_GET['thread_id']))
			{
				$this->display_thread_page();
				return array($this->get_thread_list(), array());
			}
			else
			{
				$res_page = 1;
				if(isset($_GET['res_page']))
				{
					$res_page = htmlspecialchars($_GET['res_page']);
				}
				$thread_id = htmlspecialchars($_GET['thread_id']);
				$this->display_res_page($thread_id, $res_page);
				return array($this->models->get_thread_list($thread_id), 
						$this->models->get_res_num_by_page($thread_id, $res_page, $this->disp_num));
			}
		}
	}

	public function get_thread_list()
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
		return Page::paging_thread($this->page, $max);
	}

	public function display_res_page($thread_id, $res_page)
	{
		$res_list = $this->models->get_res_list($thread_id);
		$res_num = ceil(count($res_list)/$this->disp_num);
		return Page::paging_res($thread_id, $res_page, $res_num);
	}
}
