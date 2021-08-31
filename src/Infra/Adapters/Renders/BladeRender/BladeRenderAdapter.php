<?php

declare(strict_types=1);

namespace App\Infra\Adapters\Renders\BladeRender;

use Jenssegers\Blade\Blade;

final class BladeRenderAdapter
{
  public function execute($path, $data): string
  {
    $blade = new Blade('../views', 'cache');
    $html = $blade->render($path, $data);
    return $html;
  }
}