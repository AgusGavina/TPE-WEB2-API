<?php
require_once 'database/config.php';
require_once 'libs/Router.php';
require_once 'app/controllers/product.api.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
//                ENDPOINT   verbo          controller           metodo
$router->addRoute('Productos', 'GET', 'ProductApiController', 'getProducts'); // Consigna 2
$router->addRoute('Productos', 'POST', 'ProductApiController', 'addProduct'); // Consigna 4
$router->addRoute('Productos/:ID', 'GET', 'ProductApiController', 'getProducts'); // Consigna 5
$router->addRoute('Productos/:ID', 'PUT', 'ProductApiController', 'updateProduct');
$router->addRoute('Productos/:ID', 'DELETE', 'productApiController', 'deleteProduct');

// rutea
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
?>