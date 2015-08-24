<?php

class Logout
{
  public function execute()
  {
     return header("Location: http://192.168.33.12/BBS/index.php?url=login");
  }
}
