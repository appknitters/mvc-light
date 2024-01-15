<?php
/** AppKnitters MVC-Light**/

require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\SiteController;
use app\controllers\AuthController;
use app\core\Application;

$cwd = dirname(__DIR__);

$app = new Application($cwd);

//$router = new Router();

$app->router->get('/',[SiteController::class,'home']);

$app->router->get('/contact',[SiteController::class,'contact']);

$app->router->post('/contact',[SiteController::class,'handleContact']);

// AuthController

$app->router->get('/login', [AuthController::class,'login']);
$app->router->post('/login', [AuthController::class,'login']);
$app->router->get('/register', [AuthController::class,'register']);
$app->router->post('/register', [AuthController::class,'register']);
//$app->userRouter($router);

$app->run();