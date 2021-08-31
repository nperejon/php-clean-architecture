<?php

declare(strict_types=1);

namespace App\Main\Factories\User\CreateUser;

use App\Infra\Http\Controllers\CreateUser\ApiCreateUserController;
use App\Infra\Repositories\MySQL\PdoUserRepository;
use App\Usecases\CreateUser\CreateUser;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

final class ApiCreateUserControllerFactory
{
  public static function make(Request $request, Response $response) : ApiCreateUserController
  {
    $usecase = new CreateUser(new PdoUserRepository());
    $controller = new ApiCreateUserController($request, $response, $usecase);
    return $controller;
  }
}