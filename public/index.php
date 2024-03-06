<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

define('APP_DIR', dirname(__DIR__));

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once APP_DIR . '/bootstrap.php';

use App\Application;
use App\Controllers\AdminController;
use App\Controllers\ApiCarController;
use App\Controllers\CatalogController;
use App\Controllers\LoginController;
use App\Controllers\PagesController;
use App\Router;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

$router = new Router();

$router->get('/', [PagesController::class, 'home']);
$router->get('/catalog', [CatalogController::class, 'catalog']);
$router->get('/catalog/*', [CatalogController::class, 'detail']);
$router->get('/api/cars', [ApiCarController::class, 'cars']);
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'authorize']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->get('/admin', [AdminController::class, 'catalog']);
$router->get('/delete/*', [AdminController::class, 'delete']);
$router->get('/create', [AdminController::class, 'create']);
$router->post('/addCar', [AdminController::class, 'addCar']);
$router->get('/edit/*', [AdminController::class, 'edit']);
$router->post('/save/*', [AdminController::class, 'save']);


$application = new Application($router, new Capsule);

$response = $application->run(Request::createFromGlobals());

$response->send();
