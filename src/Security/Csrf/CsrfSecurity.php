<?php

declare(strict_types=1);

namespace App\Security\Csrf;

interface CsrfSecurity {
  public function generateToken();
  public function validateToken($token) : bool;
}