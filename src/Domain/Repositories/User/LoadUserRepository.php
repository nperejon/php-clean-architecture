<?php

namespace App\Domain\Repositories\User;

use App\Domain\Entities\User;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;

interface LoadUserRepository
{
  public function loadByEmail(Email $email): User;
  public function loadByCpf(Cpf $cpf): User;
  public function loadById(string $id): User;
}