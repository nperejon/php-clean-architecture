<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\Password;
use App\Domain\ValueObjects\PasswordHashed;
use App\Domain\ValueObjects\Role;
use DateTime;
use DateTimeImmutable;

final class User
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
  private Email $email;

  private Password|PasswordHashed $password;

  /**
   * @var Role
   */
  private Role $role;

  /**
   * @var Cpf
   */
  private Cpf $cpf;

  /**
   * @var DateTimeImmutable
   */
  private DateTimeImmutable $birthDate;

  /**
   * @var string
   */
  private string $avatarPath;

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
   * Set the value of name
   *
   * @param  string  $name
   *
   * @return  self
   */ 
  public function setName(string $name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of email
   *
   * @return  Email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @param  Email  $email
   *
   * @return  self
   */ 
  public function setEmail(Email $email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of role
   *
   * @return  Role
   */ 
  public function getRole()
  {
    return $this->role;
  }

  /**
   * Set the value of role
   *
   * @param  Role  $role
   *
   * @return  self
   */ 
  public function setRole(Role $role)
  {
    $this->role = $role;

    return $this;
  }

  public function __toString()
  {
    $content = 'Nome: '.$this->name.'<br />';
    $content .= 'Email: '.$this->email.'<br />';
    $content .= 'Cargo: '.$this->role.'<br />';
    return $content;
  }

  /**
   * Get the value of cpf
   *
   * @return  Cpf
   */ 
  public function getCpf()
  {
    return $this->cpf;
  }

  /**
   * Set the value of cpf
   *
   * @param  Cpf  $cpf
   *
   * @return  self
   */ 
  public function setCpf(Cpf $cpf)
  {
    $this->cpf = $cpf;

    return $this;
  }

  /**
   * Get the value of birthDate
   *
   * @return  DateTimeImmutable
   */ 
  public function getBirthDate()
  {
    return $this->birthDate;
  }

  /**
   * Set the value of birthDate
   *
   * @param  DateTimeImmutable  $birthDate
   *
   * @return  self
   */ 
  public function setBirthDate(DateTimeImmutable $birthDate)
  {
    $this->birthDate = $birthDate;

    return $this;
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

  /**
   * Set the value of avatarPath
   *
   * @param  string  $avatarPath
   *
   * @return  self
   */ 
  public function setAvatarPath(string $avatarPath)
  {
    $this->avatarPath = $avatarPath;

    return $this;
  }

  public function toArray() {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'email' => (string)$this->email,
      'password' => (string) $this->password,
      'role' => (string)$this->role,
      'cpf' => (string)$this->cpf,
      'birthDate' => $this->birthDate->format(DateTime::ATOM),
      'avatarPath' => $this->avatarPath
    ];
  }


  /**
   * Get the value of id
   *
   * @return  string
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @param  string  $id
   *
   * @return  self
   */ 
  public function setId(string $id)
  {
    $this->id = $id;

    return $this;
  }
  /**
   * Set the value of password
   *
   * @param  Password  $password
   *
   * @return  self
   */ 
  public function setPassword(Password|PasswordHashed $password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of password
   */ 
  public function getPassword()
  {
    return $this->password;
  }
}