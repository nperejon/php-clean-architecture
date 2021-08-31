<?php

declare(strict_types=1);

namespace App\Usecases\LoginUser;

final class InputBoundary
{ 
  /**
   * @var string
   */
  private string $email;

  /**
   * @var string
   */
  private string $password;

  public function __construct(string $email, string $password)
  {
    $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $this->password = filter_var($password, FILTER_SANITIZE_STRING);
  }

  /**
   * Get the value of email
   *
   * @return  string
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Get the value of password
   *
   * @return  string
   */ 
  public function getPassword()
  {
    return $this->password;
  }
}