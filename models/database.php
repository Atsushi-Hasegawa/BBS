<?php

class DataBase
{
	private $pdo;

	public function __construct()
	{
		$config = $this->load_config();
		$this->pdo = $this->connection($config); 
	}

	private function connection($config)
	{
		try
		{
			$pdo = new PDO($config['dsn'], $config['user'], $config['passwd']);
			return $pdo;
		} 
		catch(PDOException $e)
		{
			echo $e->getMessage();
			return false;
		}
	}

	public function load_config()
	{
		$config = '';
		$filename =  "/home/vagrant/public/BBS/config/mysql.json";
		if(is_file($filename))
		{
			$result = file_get_contents($filename);
			$config = json_decode($result, true);
		}
		return $config;
	}

	public function query($sql, array $options)
	{
		if(!is_string($sql)) return false;
		$stmt = $this->pdo->prepare($sql);
		foreach($options as $option)
		{
			$stmt->bindParam($option[0], $option[1], $option[2]);
		}
		return $stmt->execute();
	}

	public function select($sql, array $data_list)
	{
		if(!is_string($sql)) return array();
		$stmt = $this->pdo->prepare($sql);
		foreach($data_list as $data)
		{
			$stmt->bindParam($data[0], $data[1], $data[2]);
		}
		$stmt->execute();
		return $stmt->fetchAll();
	}
}

