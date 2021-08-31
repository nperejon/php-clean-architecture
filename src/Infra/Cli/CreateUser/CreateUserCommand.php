<?php

declare(strict_types=1);

namespace App\Infra\Cli\CreateUser;

use App\Usecases\CreateUser\CreateUser;
use App\Usecases\CreateUser\InputBoundary;

final class CreateUserCommand
{
  private CreateUser $usecase;

  public function __construct(CreateUser $usecase)
  {
    $this->usecase = $usecase;
  }

  public function handle(): string
  {
    $inputBoundary = new InputBoundary("Nicolas Amorim", "nicolas@dampa.com.br", "senha123", "Admin", "01234567890", "2002-07-06");
    $output = $this->usecase->handle($inputBoundary);
    return "User created";
  }
}