<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\LoadUser;

use App\Infra\Http\Controllers\Contracts\HtmlPresentation;
use App\Infra\Http\Controllers\Contracts\Middlewares\AuthenticationMiddleware;
use App\Usecases\LoadUser\InputBoundary;
use App\Usecases\LoadUser\LoadUser;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HtmlLoadUserController
{
  private Request $request;
  private Response $response;
  private LoadUser $usecase;
  private AuthenticationMiddleware $authentication;

  public function __construct(Request $request, Response $response, LoadUser $usecase, AuthenticationMiddleware $authentication)
  {
    $this->request = $request;
    $this->response = $response;
    $this->usecase = $usecase;
    $this->authentication = $authentication;
  }

  public function handle(HtmlPresentation $presentation): Response
  {
    $data = json_decode($this->request->getBody()->getContents());
    $inputBoundary = new InputBoundary($data->id);
    $output = $this->usecase->handle($inputBoundary);
    $authentication = $this->authentication->auth($output->getId(), $output->getRole());
    
    if($authentication) {
      $this->response
        ->getBody()
        ->write($presentation->output('painel/login', [
            "logged" => true
          ]));
    } else {
      $this->response
      ->getBody()
      ->write($presentation->output('painel/login', []));
    }

    return 
      $this->response
        ->withHeader('Content-Type', 'text/html')
        ->withStatus(200);
  }}