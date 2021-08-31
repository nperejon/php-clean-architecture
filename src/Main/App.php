<?php

declare(strict_types=1);

namespace App\Main;

use App\Main\Routes\Router;

final class App
{
  public static function start()
  {
    Router::create();
  }
}