<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

final class Email
{
  private string $email;

  public function __construct(string $email)
  {
    if(!$this->validate($email)) throw new DomainException('Email is not valid');
    $this->email = $email;
  }

  private function validate(string $email)
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
    return true;
  }

  public function value()
  {
    return $this->email;
  }

  public function __toString()
  {
    return $this->email;
  }
}