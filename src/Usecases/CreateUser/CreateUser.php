<?php

declare(strict_types=1);

namespace App\Usecases\CreateUser;

use App\Domain\Entities\User;
use App\Domain\Repositories\User\CreateUserRepository;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\Password;
use App\Domain\ValueObjects\Role;
use DateTimeImmutable;

final class CreateUser
{
  private CreateUserRepository $repository;

  public function __construct(CreateUserRepository $repository)
  {
    $this->repository = $repository;
  }

  /**
   * @param InputBoundary $input
   * 
   * @return OutputBoundary
   */
  public function handle(InputBoundary $input): OutputBoundary
  {
    $user = new User();
    $user
      ->setName($input->getName())
      ->setEmail(new Email($input->getEmail()))
      ->setPassword(new Password($input->getPassword()))
      ->setRole(new Role($input->getRole()))
      ->setCpf(new Cpf($input->getCpf()))
      ->setBirthDate(new DateTimeImmutable($input->getBirthDate()))
      ->setAvatarPath($input->getAvatarPath());

    $this->repository->store($user);

    return new OutputBoundary([]);
  }
}