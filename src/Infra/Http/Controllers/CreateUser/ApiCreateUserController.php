<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\CreateUser;

use App\Infra\Http\Controllers\Contracts\ApiPresentation;
use App\Usecases\CreateUser\CreateUser;
use App\Usecases\CreateUser\InputBoundary;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ApiCreateUserController
{
  private Request $request;
  private Response $response;
  private CreateUser $usecase;

  public function __construct(Request $request, Response $response, CreateUser $usecase)
  {
    $this->request = $request;
    $this->response = $response;
    $this->usecase = $usecase;
  }

  public function handle(ApiPresentation $presentation): Response
  {
    // echo print_r($this->request->getBody()->getContents());
    $inputBoundary = new InputBoundary("Nicolas Amorim", "nicolas@dampa.com.br", "senha123", "Admin", "01234567890", "2002-07-06");
    $output = $this->usecase->handle($inputBoundary);
    $this->response
      ->getBody()
      ->write($presentation->output([
          "success" => "User created."
        ]));
    return 
      $this->response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
  }
}