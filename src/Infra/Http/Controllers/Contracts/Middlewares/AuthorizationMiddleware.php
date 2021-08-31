<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\Contracts\Middlewares;

interface AuthorizationMiddleware {
  public function auth();
  public function register();
}