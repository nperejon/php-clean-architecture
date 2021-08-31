<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class Password
{
  private string $password;

  public function __construct(string $password)
  {
    $this->password = password_hash($password, PASSWORD_ARGON2ID);
  }

  public static function validate(string $password, string $hash)
  {
    return password_verify($password, $hash);
  }

  public function value()
  {
    return $this->password;
  }

  public function __toString()
  {
    return $this->password;
  }
}