<?php
require_once 'database/config.php';
require_once 'libs/Router.php';

require_once 'app/controllers/admin.api.controller.php';
require_once 'app/controllers/products.api.controller.php';

// crea el router
$router = new Router();

// default route
$router->setDefaultRoute('ProductsApiController', 'show404');  

//                      ENDPOINT             verbo          controller           metodo
$router->addRoute('Administrador/Productos', 'GET', 'AdminApiController', 'getProducts'); // Consigna 2
$router->addRoute('Administrador/Productos/:ID', 'GET', 'AdminApiController', 'getProducts');
$router->addRoute('Administrador/Productos', 'POST', 'AdminApiController', 'insertProduct'); // Consigna 5
$router->addRoute('Administrador/Productos/:ID', 'PUT', 'AdminApiController', 'updateProduct'); // Consigna 5   
$router->addRoute('Administrador/Productos/:ID', 'DELETE', 'AdminApiController', 'deleteProduct');
$router->addRoute('Administrador/Categorias', 'GET', 'AdminApiController', 'getCategorys'); // Consigna 2
$router->addRoute('Administrador/Categorias/:ID', 'GET', 'AdminApiController', 'getCategorys');
$router->addRoute('Administrador/Categorias', 'POST', 'AdminApiController', 'insertCategory'); // Consigna 5  
$router->addRoute('Administrador/Categorias/:ID', 'PUT', 'AdminApiController', 'updateCategory'); // Consigna 5  
$router->addRoute('Administrador/Categorias/:ID', 'DELETE', 'AdminApiController', 'deleteCategory');


$router->addRoute('Productos', 'GET', 'ProductsApiController', 'getProducts'); // Consigna 2
$router->addRoute('Categorias', 'GET', 'AdminApiController', 'getCategorys'); // Consigna 2
$router->addRoute('Productos/:Categoria', 'GET', 'ProductsApiController', 'getProductsByParams'); // Consigna 3 - Añadir asendente o desencente
$router->addRoute('Productos/:Categoria/:Producto', 'GET', 'ProductsApiController', 'getProductsByParams');

// rutea
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
?>