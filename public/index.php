<?php

require_once __DIR__ . '/../vendor/autoload.php';


// Débogueur
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


// TODO organiser la partie configuration
$config = parse_ini_file(__DIR__ . "/../config.ini");
define('BASE_URI', $config['base_uri']);



// Router
use App\core\Router;

$router = new Router();

$router->register('/home', '\App\controller\DefaultController::index');
$router->register('/login', '\App\controller\UserController::login');
$router->register('/logout', '\App\controller\UserController::logout');
$router->register('/register', '\App\controller\UserController::register');
$router->register('/dashboard', '\App\controller\UserController::dashboard');
$router->register('/departements/#code_region', '\App\controller\UserController::getDepartements');
$router->register('/cities/#code_department', '\App\controller\UserController::getCities');

$router->run();

