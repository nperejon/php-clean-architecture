<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\Contracts;

interface HtmlPresentation
{
  public function output(string $path, array $data): string;
}