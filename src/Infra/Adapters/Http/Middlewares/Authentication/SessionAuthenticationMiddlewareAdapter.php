<?php

declare(strict_types=1);

namespace App\Infra\Adapters\Http\Middlewares\Authentication;

use App\Infra\Http\Controllers\Contracts\Middlewares\AuthenticationMiddleware;

final class SessionAuthenticationMiddlewareAdapter implements AuthenticationMiddleware {
  private int $hours = 60 * 60; // hours * minutes * seconds

  public function auth(string $userId, string $role) : bool {
    session_start();
    
    // Verify IP Address
    if (!isset($_SESSION['last_ip'])) $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];

    if($_SESSION['last_ip'] != $_SERVER['REMOTE_ADDR']) {
      session_unset();
      session_destroy();
      return false;
    }

    if (!isset($_SESSION['last_action'])) $_SESSION['last_action'] = time();

    $inactiveTime = time() - $_SESSION['last_action'];
    $limitInactiveTime = 2 * $this->hours;

    if ($inactiveTime >= $limitInactiveTime) {
      session_unset();
      session_destroy();
      return false;
    }

    if (!isset($_SESSION['userid'])) $_SESSION['userid'] = $userId;
    if ($_SESSION['userid'] != $userId) {
      session_unset();
      session_destroy();
      return false;
    }

    if (!isset($_SESSION['role'])) $_SESSION['role'] = $role;
    if ($_SESSION['role'] != $role) {
      session_unset();
      session_destroy();
      return false;
    }


    $_SESSION['last_action'] = time();

    session_regenerate_id();
    session_write_close();

    return true;
  }

  public function isLogged() : bool {
    session_start();

    if($_SESSION['last_ip'] != $_SERVER['REMOTE_ADDR']) {
      session_unset();
      session_destroy();
      return false;
    }

    $inactiveTime = time() - $_SESSION['last_action'];
    $limitInactiveTime = 2 * $this->hours;
    if ($inactiveTime >= $limitInactiveTime) {
      session_unset();
      session_destroy();
      return false;
    }

    if (!isset($_SESSION['userid'])) {
      session_unset();
      session_destroy();
      return true;
    }

    if (!isset($_SESSION['role'])) {
      session_unset();
      session_destroy();
      return true;
    }

    $_SESSION['last_action'] = time();

    session_regenerate_id();
    session_write_close();

    return true;
  }
  
  public function logout() {
    session_unset();
    session_destroy();
    return true;
  }
}