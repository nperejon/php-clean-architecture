<?php

declare(strict_types=1);

namespace App\Main\Factories\User\CreateUser;

use App\Infra\Presenters\CreateUser\ApiCreateUserPresenter;
use CoffeeCode\Router\Router;
use GuzzleHttp\Psr7\Response;
use App\Infra\Adapters\Http\CoffeeCodeRouter\CoffeeCodeRouterAdapter;

final class ApiCreateUserRouteFactory
{
  public static function make(): Router
  {
    $router = new Router(env("HOST_URL"));
    $router->post("/register", function ($data){
      $request = CoffeeCodeRouterAdapter::adaptRequest($data);
      $response = new Response();
      $controller = ApiCreateUserControllerFactory::make($request, $response);
      $presenter = new ApiCreateUserPresenter();
      $response = $controller
        ->handle($presenter)
        ->getBody();
      echo $response;
    });
    return $router;
  }
}