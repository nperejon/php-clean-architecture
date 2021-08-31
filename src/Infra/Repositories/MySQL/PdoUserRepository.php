<?php

declare(strict_types=1);

namespace App\Infra\Repositories\MySQL;

use App\Domain\Entities\User;
use App\Domain\Exceptions\UserNotFoundException;
use App\Domain\Repositories\User\CreateUserRepository;
use App\Domain\Repositories\User\LoadUserRepository;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\Password;
use App\Domain\ValueObjects\PasswordHashed;
use App\Domain\ValueObjects\Role;
use App\Infra\Repositories\Connections\PDOConnection;
use DateTimeImmutable;
use PDO;

final class PdoUserRepository implements CreateUserRepository, LoadUserRepository {
  private PDO $pdo;

  public function __construct()
  {
    $this->pdo = PDOConnection::get();
  }

  public function loadByEmail(Email $email): User {
    $statement = $this->pdo->prepare("SELECT * FROM users WHERE email=?");
    $statement->execute([$email]);
    $userFromRepo = $statement->fetch();
    if($userFromRepo == false) throw new UserNotFoundException();
    $user = new User();
    $user
      ->setId($userFromRepo['id'])
      ->setName($userFromRepo['name'])
      ->setEmail(new Email($userFromRepo['email']))
      ->setCpf(new Cpf($userFromRepo['cpf']))
      ->setAvatarPath($userFromRepo['avatarPath'])
      ->setPassword(new PasswordHashed($userFromRepo['password']))
      ->setRole(new Role($userFromRepo['role']))
      ->setBirthDate(new DateTimeImmutable($userFromRepo['birthDate']));
    return $user;  
  }

  public function loadByCpf(Cpf $cpf): User {
    return new User();
  }

  public function loadById(string $id): User {
    $statement = $this->pdo->prepare("SELECT * FROM users WHERE id=?");
    $statement->execute([$id]);
    $userFromRepo = $statement->fetch();
    if($userFromRepo == false) throw new UserNotFoundException();
    $user = new User();
    $user
      ->setId($userFromRepo['id'])
      ->setName($userFromRepo['name'])
      ->setEmail(new Email($userFromRepo['email']))
      ->setCpf(new Cpf($userFromRepo['cpf']))
      ->setAvatarPath($userFromRepo['avatarPath'])
      ->setPassword(new PasswordHashed($userFromRepo['password']))
      ->setRole(new Role($userFromRepo['role']))
      ->setBirthDate(new DateTimeImmutable($userFromRepo['birthDate']));
    return $user;
  }

  public function store(User $user)
  {
    $statement = $this->pdo->prepare("INSERT INTO users (name, email, password, role, cpf, avatarPath, birthDate, createdAt, updatedAt) VALUES (?,?,?,?,?,?,?,?,?)");
    $statement->execute([
      $user->getName(), 
      (string) $user->getEmail(), 
      $user->getPassword(),
      (string) $user->getRole(),
      (string) $user->getCpf(),
      $user->getAvatarPath(),
      $user->getBirthDate()->format("Y-m-d H:i:s"),
      date("Y-m-d H:i:s"),
      date("Y-m-d H:i:s")
    ]);
  }
}