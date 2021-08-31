<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\LoginUser;

use App\Infra\Http\Controllers\Contracts\HtmlPresentation;
use App\Infra\Http\Controllers\Contracts\Middlewares\AuthenticationMiddleware;
use App\Security\Csrf\CsrfSecurity;
use App\Usecases\LoginUser\InputBoundary;
use App\Usecases\LoginUser\LoginUser;
use Exception;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HtmlLoginUserPostController
{
  private Request $request;
  private Response $response;
  private LoginUser $usecase;
  private AuthenticationMiddleware $authentication;
  private CsrfSecurity $crsf;

  public function __construct(Request $request, Response $response, LoginUser $usecase, AuthenticationMiddleware $authentication, CsrfSecurity $csrf)
  {
    $this->request = $request;
    $this->response = $response;
    $this->usecase = $usecase;
    $this->authentication = $authentication;
    $this->crsf = $csrf;
  }

  public function handle(HtmlPresentation $presentation): Response
  {
    try {
      $data = json_decode($this->request->getBody()->getContents());
      $inputBoundary = new InputBoundary($data->email, $data->password);
      $output = $this->usecase->handle($inputBoundary);
      $authentication = $this->authentication->auth($output->getId(), $output->getRole());

      if($authentication) {
        $this->response
          ->getBody()
          ->write($presentation->output('painel/login', [
              "logged" => true,
              "url" => env('HOST_URL') .'/painel/dashboard'
            ]));
      } else {
        throw new Exception('Erro no login');
      }
    return
      $this->response
        ->withHeader('Content-Type', 'text/html')
        ->withStatus(200);
    } catch (Exception $e) {
        $this->response
          ->getBody()
          ->write($presentation->output('painel/login', [
            'error' => $e->getMessage(),
            'token' => $this->crsf->generateToken()
          ]));
        return $this->response
          ->withHeader('Content-Type', 'text/html')
          ->withStatus(400);
    }
  }}