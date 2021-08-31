<?php

declare(strict_types=1);

namespace App\Main\Factories\User\LoginUser;

use App\Infra\Adapters\Http\Middlewares\Authentication\SessionAuthenticationMiddlewareAdapter;
use App\Infra\Adapters\Security\Csrf\CsrfSecurityAdapter;
use App\Infra\Http\Controllers\LoginUser\HtmlLoginUserGetController;
use App\Infra\Http\Controllers\LoginUser\HtmlLoginUserPostController;
use App\Infra\Repositories\MySQL\PdoUserRepository;
use App\Usecases\LoginUser\LoginUser;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

final class HtmlLoginUserControllerFactory
{
  public static function get(Response $response): HtmlLoginUserGetController
  {
    $csrf = new CsrfSecurityAdapter();
    $authentication = new SessionAuthenticationMiddlewareAdapter();
    return new HtmlLoginUserGetController($response, $authentication, $csrf);
  }

  public static function post(Request $request, Response $response): HtmlLoginUserPostController
  {
    $usecase = new LoginUser(new PdoUserRepository());
    $authentication = new SessionAuthenticationMiddlewareAdapter();
    $crsf = new CsrfSecurityAdapter();
    return new HtmlLoginUserPostController($request, $response, $usecase, $authentication, $crsf);
  }
}