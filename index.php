<?php
define('BASE_PATH', __DIR__);

require_once 'core/router.php';
require_once 'controller/UserController.php';
$router = new Router();

$defineRoutes = require 'routes/routes.php';
$defineRoutes($router);

$router->handleRequest();
?>

