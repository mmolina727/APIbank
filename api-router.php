<?php
require_once './libs/Router.php';
require_once './app/controllers/client-apiController.php';

$router = new Router();

//$router->addRoute('clients', 'GET', 'ClientApiController', 'getClientsByColumn');
$router->addRoute('client/:ID', 'GET', 'ClientApiController', 'getClient');
$router->addRoute('clients', 'GET', 'ClientApiController', 'getClients');
$router->addRoute('clients', 'POST', 'ClientApiController', 'addClient');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);