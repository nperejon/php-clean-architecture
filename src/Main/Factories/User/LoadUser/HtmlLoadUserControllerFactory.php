<?php

declare(strict_types=1);

namespace App\Main\Factories\User\LoadUser;

use App\Infra\Adapters\Http\Middlewares\Authentication\SessionAuthenticationMiddlewareAdapter;
use App\Infra\Http\Controllers\LoadUser\HtmlLoadUserController;
use App\Infra\Repositories\MySQL\PdoUserRepository;
use App\Usecases\LoadUser\LoadUser;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

final class HtmlLoadUserControllerFactory
{
  public static function make(Request $request, Response $response): HtmlLoadUserController
  {
    $usecase = new LoadUser(new PdoUserRepository());
    $authentication = new SessionAuthenticationMiddlewareAdapter();
    return new HtmlLoadUserController($request, $response, $usecase, $authentication);
  }
}