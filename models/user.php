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
    if(!is_array($user_info))
    {
      return false;
    }
    foreach($user_info as $info)
    {
      if($info['name'] === $user && $info['password'] === $passwd)
      {
        return true;
      }
    }
    return false;
  }
}
