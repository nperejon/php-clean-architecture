<?php

namespace App\Domain\Repositories\User;

use App\Domain\Entities\User;

interface CreateUserRepository
{
  public function store(User $user);
}