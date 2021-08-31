<?php

declare(strict_types=1);

namespace App\Infra\Adapters\Security\Csrf;

use App\Security\Csrf\CsrfSecurity;

final class CsrfSecurityAdapter implements CsrfSecurity {
  public function generateToken() {
    $token = md5(uniqid((string) mt_rand(), true));
    $_SESSION["token"] = $token;
    return $token;
  }

  public function validateToken($token) : bool {
    if($_SESSION["token"] != $token) {
      session_destroy();
      return false;
    }
    return true;
  }
}