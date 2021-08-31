<?php

declare(strict_types=1);

namespace App\Usecases\LoadUser;

final class InputBoundary
{
  /**
   * @var string
   */
  private string $userId;
  
  public function __construct(string $userId)
  {
    $this->userId = filter_var($userId, FILTER_SANITIZE_STRING);
  }

  /**
   * Get the value of userId
   *
   * @return  string
   */ 
  public function getUserId()
  {
    return $this->userId;
  }
}