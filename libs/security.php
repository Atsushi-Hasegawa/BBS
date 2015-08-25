<?php

class Security
{
  public static function http_parse($request)
  {
    return htmlspecialchars($request, ENT_QUOTES, 'UTF-8');
  }
}
