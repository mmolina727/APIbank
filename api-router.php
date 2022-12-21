<?php
require_once './libs/Router.php';
require_once './app/controllers/client-apiController.php';

$router = new Router();

$router->addRoute('client/:ID', 'GET', 'ClientApiController', 'getClient');
$router->addRoute('clients', 'GET', 'ClientApiController', 'getClients');
$router->addRoute('client', 'POST', 'ClientApiController', 'addClient');
$router->addRoute('client/:ID', 'DELETE', 'ClientApiController', 'delete');
$router->addRoute('client/:ID', 'PUT', 'ClientApiController', 'updateClient');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);