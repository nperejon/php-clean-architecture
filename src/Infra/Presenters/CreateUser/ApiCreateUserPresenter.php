<?php

declare(strict_types=1);

namespace App\Infra\Presenters\CreateUser;

use App\Infra\Http\Controllers\Contracts\ApiPresentation;

final class ApiCreateUserPresenter implements ApiPresentation
{
  public function output(array $data): string
  {
    return json_encode($data);
  }
}