<?php

require __DIR__ . '/bootstrap.php';

use App\Infra\Cli\CreateUser\CreateUserCommand;
use App\Infra\Repositories\MySQL\PdoUserRepository;
use App\Usecases\CreateUser\CreateUser;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

$dsn = sprintf(
  'mysql:host=%s;port=%s;dbname=%s;charset=%s',
  $config["db"]["host"],
  $config["db"]["port"],
  $config["db"]["dbname"],
  $config["db"]["charset"]
);

$pdo = new PDO($dsn, $config["db"]["username"], $config["db"]["password"], [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_PERSISTENT => TRUE
]);

$request = new Request("GET", "/");
$response = new Response(200);
$createUserUsecase = new CreateUser(new PdoUserRepository($pdo));
$createUserCommand = new CreateUserCommand($createUserUsecase);
echo $createUserCommand->handle();