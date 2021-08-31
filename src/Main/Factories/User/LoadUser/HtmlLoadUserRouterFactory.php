<?php

declare(strict_types=1);

namespace App\Main\Factories\User\LoadUser;

use App\Infra\Adapters\Http\CoffeeCodeRouter\CoffeeCodeRouterAdapter;
use App\Infra\Adapters\Renders\BladeRender\BladeRenderAdapter;
use App\Infra\Presenters\LoadUser\HtmlLoadUserPresenter;
use CoffeeCode\Router\Router;

final class HtmlLoadUserRouterFactory
{
  public static function make(): Router
  {
    $router = new Router(env("HOST_URL"));
    $router->get("/user/{id}", function ($data){
      $request = CoffeeCodeRouterAdapter::adaptRequest($data);
      $response = CoffeeCodeRouterAdapter::adaptResponse($data);
      $controller = HtmlLoadUserControllerFactory::make($request, $response);
      $render = new BladeRenderAdapter();
      $presenter = new HtmlLoadUserPresenter($render);
      $response = $controller
        ->handle($presenter)
        ->getBody();
      echo $response;
    });
    return $router;
  }
}