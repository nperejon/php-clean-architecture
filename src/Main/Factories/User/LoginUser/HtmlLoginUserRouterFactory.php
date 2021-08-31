<?php

declare(strict_types=1);

namespace App\Main\Factories\User\LoginUser;

use App\Infra\Adapters\Http\CoffeeCodeRouter\CoffeeCodeRouterAdapter;
use App\Infra\Adapters\Renders\BladeRender\BladeRenderAdapter;
use App\Infra\Presenters\LoginUser\HtmlLoginUserPresenter;
use CoffeeCode\Router\Router;

final class HtmlLoginUserRouterFactory
{
  public static function make(): Router
  {
    $router = new Router(env("HOST_URL"));
    $router->get("/login", function ($data){
      $response = CoffeeCodeRouterAdapter::adaptResponse($data);
      $render = new BladeRenderAdapter();
      $controller = HtmlLoginUserControllerFactory::get($response);
      $render = new BladeRenderAdapter();
      $presenter = new HtmlLoginUserPresenter($render);
      $response = $controller
        ->handle($presenter)
        ->getBody();
      echo $response;
    });
    
    $router->post("/login", function ($data){
      $request = CoffeeCodeRouterAdapter::adaptRequest($data);
      $response = CoffeeCodeRouterAdapter::adaptResponse($data);
      $controller = HtmlLoginUserControllerFactory::post($request, $response);
      $render = new BladeRenderAdapter();
      $presenter = new HtmlLoginUserPresenter($render);
      $response = $controller
        ->handle($presenter)
        ->getBody();
      echo $response;
    });
    return $router;
  }
}