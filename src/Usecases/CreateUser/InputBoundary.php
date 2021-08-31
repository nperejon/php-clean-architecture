<?php

declare(strict_types=1);

namespace App\Usecases\CreateUser;

final class InputBoundary
{
  /**
   * @var string
   */
  private string $name;

  /**
   * @var string
   */
  private string $email;

  /**
   * @var string
   */
  private string $password;

  /**
   * @var string
   */
  private string $role;

  /**
   * @var string
   */
  private string $cpf;

  /**
   * @var string
   */
  private string $birthDate;

  private string $avatarPath;


  public function __construct(string $name, string $email, string $password, string $role, string $cpf, string $birthDate, string $avatarPath = 'images/avatars/default.png')
  {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->role = $role;
    $this->cpf = $cpf;
    $this->birthDate = $birthDate;
    $this->avatarPath = $avatarPath;
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
   * Get the value of password
   *
   * @return  string
   */ 
  public function getPassword()
  {
    return $this->password;
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
   * Get the value of birthDate
   *
   * @return  string
   */ 
  public function getBirthDate()
  {
    return $this->birthDate;
  }

  /**
   * Get the value of avatarPath
   */ 
  public function getAvatarPath()
  {
    return $this->avatarPath;
  }
}