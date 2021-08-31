<?php

declare(strict_types=1);

namespace App\Infra\Presenters\LoadUser;

use App\Infra\Http\Controllers\Contracts\HtmlPresentation;

final class HtmlLoadUserPresenter implements HtmlPresentation
{
  public function __construct($render)
  {
    $this->render = $render;
  }

  public function output(string $path, array $data): string
  {
    $html = $this->render->execute($path, $data);
    return $html;
  }
}