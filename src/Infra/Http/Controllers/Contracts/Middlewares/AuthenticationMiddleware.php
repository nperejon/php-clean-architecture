<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\Contracts\Middlewares;

interface AuthenticationMiddleware {
  public function auth(string $userId, string $role) : bool;
  public function isLogged() : bool;
  public function logout();
}