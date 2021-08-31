<?php

declare(strict_types=1);

namespace App\Usecases\LoadUser;

use App\Domain\Repositories\User\LoadUserRepository;

final class LoadUser
{
  private LoadUserRepository $repository;

  public function __construct(LoadUserRepository $repository)
  {
   $this->repository = $repository; 
  }
  public function handle(InputBoundary $input): OutputBoundary
  {
    $userFromRepo = $this->repository->loadById($input->getUserId());
    return new OutputBoundary(
      $userFromRepo->getId(),
      $userFromRepo->getName(),
      (string)$userFromRepo->getEmail(),
      (string)$userFromRepo->getRole(),
      (string)$userFromRepo->getCpf(),
      $userFromRepo->getAvatarPath()
    );
  }
}