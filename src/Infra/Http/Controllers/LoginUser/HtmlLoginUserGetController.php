<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\LoginUser;

use App\Infra\Http\Controllers\Contracts\HtmlPresentation;
use App\Infra\Http\Controllers\Contracts\Middlewares\AuthenticationMiddleware;
use App\Security\Csrf\CsrfSecurity;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

final class HtmlLoginUserGetController
{
  private CsrfSecurity $csrf;
  private Response $response;
  private AuthenticationMiddleware $authentication;

  public function __construct(Response $response, AuthenticationMiddleware $authentication, CsrfSecurity $csrf)
  {
    $this->response = $response;
    $this->csrf = $csrf;
    $this->authentication = $authentication;
  }

  public function handle(HtmlPresentation $presentation): Response
  {
    try {
      $logged = $this->authentication->isLogged();
      $this->response
        ->getBody()
        ->write($presentation->output('painel/login', [
            "token" => $this->csrf->generateToken(),
            "logged" => $logged,
            "url" => env('HOST_URL') .'/painel/dashboard'
          ]));
      return
        $this->response
          ->withHeader('Content-Type', 'text/html')
          ->withStatus(200);
    } catch (Exception $e) {
      $this->response
      ->getBody()
      ->write($presentation->output('painel/login', ['error' => $e->getMessage()]));
    }
  }}