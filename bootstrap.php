<?php

use App\Main\App;

require __DIR__.'/env.php';

if(!function_exists('env')) {
  function env($key, $default = null)
  {
      $value = getenv($key);

      if ($value === false) {
          return $default;
      }

      return $value;
  }
}

require __DIR__.'/vendor/autoload.php';

function asset($path) {
  return env('HOST_URL').'/assets/'.$path;
}

ini_set('use_strict_mode', true);
ini_set('use_only_cookies', true);
ini_set('use_trans_sid', false);

App::start();