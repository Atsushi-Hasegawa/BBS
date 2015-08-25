<?php

require_once(__DIR__ . "/database.php");

class User extends DataBase
{
  public function get_user_list($user)
  {
     $sql = "SELECT * FROM user WHERE name=:name";
     $bind_param = array(array(":name", $user, PDO::PARAM_STR));
     return $this->select($sql, $bind_param);
  }

  public function authenticate($user, $passwd)
  {
    $user_info = $this->get_user_list($user);
		$passwd_verify = crypt($passwd, CRYPT_MD5);
    if(!is_array($user_info))
    {
      return false;
    }
    foreach($user_info as $info)
    {
      if($info['name'] === $user && $info['password'] === $passwd_verify)
      {
        return true;
      }
    }
    return false;
  }

	public function add($name, $password)
	{
		$user_list = $this->get_user_list($name);
		if(empty($user_list))
		{
			$sql = "INSERT INTO user(name, password) VALUES(:name, :password)";
			$bind_param = array(
			                array(":name", $name, PDO::PARAM_STR),
											array(":password", crypt($password,CRYPT_MD5), PDO::PARAM_STR)
											);
			return $this->query($sql, $bind_param);
		}
		else
		{
			return false;
		}
	}
}
