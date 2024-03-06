<?php
return [
    'driver' => 'mysql',
    'host' => env('DB_HOST', 'localhost'),
    'database' => env('DB_NAME', 'database'),
    'username' => env('DB_USER', 'root'),
    'password' => env('DB_PASS', ''),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
];