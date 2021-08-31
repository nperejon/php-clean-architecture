<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\Contracts;

interface ApiPresentation
{
  public function output(array $data): string;
}