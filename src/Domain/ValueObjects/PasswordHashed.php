<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class PasswordHashed
{
  private string $password;

  public function __construct(string $password)
  {
    $this->password = $password;
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