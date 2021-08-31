<?php

declare(strict_types=1);

namespace App\Infra\Repositories\Connections;

use Exception;
use PDO;

final class PDOConnection
{
  public static function get(): PDO
  {
    $dsn = sprintf(
      'mysql:host=%s;port=%s;dbname=%s;charset=%s',
      env("DB_HOST"),
      env("DB_PORT"),
      env("DB_NAME"),
      env("DB_CHARSET")
    );

    try {
      $pdo = new PDO($dsn, env("DB_USERNAME"), env("DB_PASSWORD"), [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_PERSISTENT => TRUE
      ]);
      if(env("APP_MODE") == "development") {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      return $pdo;
    } catch (Exception $e) {
      echo 'An error has ocurreed with our database. Try again later.';
    }
  }
}