<?php

class Logout
{
  public function execute()
  {
     return header("Location: http://localhost:8080/BBS/login");
  }
}
