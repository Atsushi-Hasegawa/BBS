<?php

class Logout
{
  public function execute()
  {
    session_destroy();
     return header("Location: index.php?url=login");
  }
}
