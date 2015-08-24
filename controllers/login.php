<?php

require_once(__DIR__ . "/../views/index.php");

class Login
{
  private $models;
  public function __construct($page=null)
  {
    $this->models = new User();
  }

  public function execute()
  {
    if(isset($_POST['user'], $_POST['passwd']))
    {
      $user = htmlspecialchars($_POST['user']);
      $passwd = htmlspecialchars($_POST['passwd']);
      return $this->login($user, $passwd);
    } 
    else
    {
      return false;
    }
  }
  
  public function login($user, $passwd)
  {
    if($this->models->authenticate($user, $passwd))
    {
      header("Location: http://192.168.33.12/BBS/index.php?url=thread");
    }
    else
    {
      return false;
    }
  }
}
