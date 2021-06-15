<?php

require_once __DIR__.'/../vendor/autoload.php';

ini_set('display_errors', 0);

date_default_timezone_set(env('APP_TIMEZONE', 'Asia/Jakarta'));

\Dotenv\Dotenv::createImmutable(dirname(__DIR__))->safeLoad();

$app = new \App\Worker(dirname(__DIR__));

$app->withDatabase();

return $app;
