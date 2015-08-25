<?php

require_once(__DIR__ . "/../views/add.php");
class Add_User
{
	private $models;

	public function __construct($page=null)
	{
		$this->models = new User();
	}

	public function execute()
	{
		echo "hogehogehoge1";
		$name = Security::http_parse($_POST['name']);
		$password = Security::http_parse($_POST['password']);
		echo "hogehogehoge2";
		return $this->models->add($name, $password);
	}
}
