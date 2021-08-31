<?php

$variables = [
    'DB_HOST' => 'dbhost',
    'DB_USERNAME' => 'username',
    'DB_PASSWORD' => 'password',
    'DB_NAME' => 'db_name',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',
    'HOST_URL' => 'http://www.url.com.br',
    'APP_MODE' => 'development'
];

foreach ($variables as $key => $value) 
{
    putenv("$key=$value");
}
