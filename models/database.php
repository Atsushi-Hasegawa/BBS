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
		$stmt->execute();
    if(preg_match("/SELECT/i", $sql) !== 1)
    {
      return false;
    } 
    else
    {
      return $stmt->fetchAll();
    }
	}

	public function select($sql, array $data_list)
	{
		return $this->query($sql, $data_list);
	}
}

