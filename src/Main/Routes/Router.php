<?php

declare(strict_types=1);
namespace App\Main\Routes;

use App\Main\Factories\User\CreateUser\ApiCreateUserRouteFactory;
use App\Main\Factories\User\LoadUser\HtmlLoadUserRouterFactory;
use App\Main\Factories\User\LoginUser\HtmlLoginUserRouterFactory;

final class Router
{
  public static function create()
  {
    HtmlLoadUserRouterFactory::make()->dispatch();
    HtmlLoginUserRouterFactory::make()->dispatch();
    ApiCreateUserRouteFactory::make()->dispatch();
  }
}