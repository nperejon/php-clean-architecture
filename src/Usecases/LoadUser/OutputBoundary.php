<?php

declare(strict_types=1);

namespace App\Usecases\LoadUser;

use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\Role;

final class OutputBoundary
{
  /**
   * @var string
   */
  private string $id;

  /**
   * @var string
   */
  private string $name;

  /**
   * @var Email
   */
  private string $email;
  
  /**
   * @var Role
   */
  private string $role;
  
  /**
   * @var Cpf
   */
  private string $cpf;
  
  /**
   * @var string
   */
  private string $avatarPath;

  public function __construct(string $id, string $name, string $email, string $role, string $cpf, string $avatarPath)
  {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->role = $role;
    $this->cpf = $cpf;
    $this->avatarPath = $avatarPath;
  }

  /**
   * Get the value of name
   *
   * @return  string
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of name
   *
   * @return  string
   */ 
  public function getName()
  {
    return $this->name;
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
   * Get the value of role
   *
   * @return  string
   */ 
  public function getRole()
  {
    return $this->role;
  }

  /**
   * Get the value of cpf
   *
   * @return  string
   */ 
  public function getCpf()
  {
    return $this->cpf;
  }

  /**
   * Get the value of avatarPath
   *
   * @return  string
   */ 
  public function getAvatarPath()
  {
    return $this->avatarPath;
  }
}