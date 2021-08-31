<?php

declare(strict_types=1);

namespace App\Usecases\LoginUser;

use App\Domain\Repositories\User\LoadUserRepository;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\Password;
use App\Infra\Http\Controllers\Contracts\Middlewares\AuthenticationMiddleware;
use Exception;

final class LoginUser
{
  private LoadUserRepository $repository;

  public function __construct(LoadUserRepository $repository)
  {
   $this->repository = $repository;
  }

  public function handle(InputBoundary $input): OutputBoundary
  {
    $email = new Email($input->getEmail());
    $userFromRepo = $this->repository->loadByEmail($email);

    $isUser = Password::validate($input->getPassword(), (string) $userFromRepo->getPassword()->value()); 

    if ($isUser) {      
      return new OutputBoundary(
        $userFromRepo->getId(),
        $userFromRepo->getName(),
        (string)$userFromRepo->getEmail(),
        (string)$userFromRepo->getRole(),
        (string)$userFromRepo->getCpf(),
        $userFromRepo->getAvatarPath()
      );
    } else {
      throw new Exception('Usuário inválido.');
    }

  }
}