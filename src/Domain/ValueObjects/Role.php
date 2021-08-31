<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

final class Role
{
  private string $role;
  
  private array $roles = array(
    "Admin" => "Admin",
    "Member" => "Member",
    "Guest" => "Guest"
  );

  public function __construct(string $role)
  {
    if(!$this->validate($role)) throw new DomainException("Role is not valid");
    $this->role = $role;
  }

  /**
   * @param string $role
   * 
   * @return bool
   */
  private function validate(string $role)
  {
    if(!isset($this->roles[$role])) return false;
    return true;
  }

  public function __toString()
  {
    return $this->roles[$this->role];
  }

  public static function Admin()
  {
    return new self("Admin");
  }

  public static function Member()
  {
    return new self("Member");
  }

  public static function Guest()
  {
    return new self("Guest");
  }
}