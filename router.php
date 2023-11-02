<?php
require_once 'database/config.php';
require_once 'libs/Router.php';
require_once 'app/controllers/product.api.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
//                ENDPOINT   verbo          controller           metodo
$router->addRoute('Productos', 'GET', 'ProductApiController', 'getProducts');
$router->addRoute('Productos', 'POST', 'ProductApiController', 'addProduct');
$router->addRoute('Productos/:ID', 'GET', 'ProductApiController', 'getProducts');
$router->addRoute('Productos/:ID', 'DELETE', 'productApiController', 'deleteProduct');

// rutea
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
?>