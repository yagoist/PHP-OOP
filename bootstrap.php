<?php

use App\Auth;
use App\Config;
use App\Contracts\CarsRepositoryContract;
use App\FlashMessages;
use App\Repositories\CarsRepository;
use Dotenv\Dotenv;
use Illuminate\Container\Container;
use Symfony\Component\HttpFoundation\Session\Session;

function container(): Container
{
    return Container::getInstance();
}

function config(): Config
{
    return container()->get(Config::class);
}

function flash(): FlashMessages
{
    return container()->get(FlashMessages::class);
}

function auth(): Auth
{
    return container()->get(Auth::class);
}

$dotenv = Dotenv::createImmutable(APP_DIR);
$dotenv->load();

container()->singleton(CarsRepositoryContract::class, CarsRepository::class);
container()->singleton(Config::class, function () {
    return (new Config(APP_DIR . '/config'))->load();
});
container()->singleton(Session::class, function () {
    $session = new Session();
    $session->start();
    return $session;
});
