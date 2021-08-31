<?php

declare(strict_types=1);

namespace App\Infra\Adapters\Http\CoffeeCodeRouter;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

final class CoffeeCodeRouterAdapter
{
  public static function adaptRequest($request): Request
  {
    $headers = [
      'Content-Type' => 'application/json'
    ];
    
    $requestPsr = new Request($_SERVER["REQUEST_METHOD"], env("HOST_URL").$_SERVER["REQUEST_URI"], $headers, json_encode($request));
    return $requestPsr;
  }

  public static function adaptResponse(): Response
  {
    return new Response();
  }
}