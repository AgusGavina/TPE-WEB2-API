<?php
require_once 'database/config.php';
require_once 'libs/Router.php';
require_once 'app/controllers/admin.api.controller.php';
require_once 'app/controllers/products.api.controller.php';

// crea el router
$router = new Router();

// default route
$router->setDefaultRoute('userApiController', 'showHome');  

//                      ENDPOINT             verbo          controller           metodo
$router->addRoute('Administrador', 'GET', 'AdminApiController', 'showAministrador');
$router->addRoute('Administrador/Productos', 'GET', 'AdminApiController', 'getProducts'); // Consigna 2
$router->addRoute('Administrador/Productos?sort=prioridad&order=asc', 'GET', 'AdminApiController', 'getProducts'); // Consigna 3
$router->addRoute('Administrador/Productos/:ID', 'GET', 'AdminApiController', 'getProducts'); // Consigna 4
$router->addRoute('Administrador/Productos', 'POST', 'AdminApiController', 'addProduct'); // Consigna 5
$router->addRoute('Administrador/Productos/:ID', 'PUT', 'AdminApiController', 'updateProduct'); // Consigna 5   
$router->addRoute('Administrador/Productos/:ID', 'DELETE', 'AdminApiController', 'deleteProduct');
$router->addRoute('Administrador/Categorias', 'GET', 'AdminApiController', 'getCategorys'); 
$router->addRoute('Administrador/Categorias/:ID', 'GET', 'AdminApiController', 'getCategorys'); 
$router->addRoute('Administrador/Categorias', 'POST', 'AdminApiController', 'addCategory');
$router->addRoute('Administrador/Categorias/:ID', 'PUT', 'AdminApiController', 'updateCategory');
$router->addRoute('Administrador/Categorias/:ID', 'DELETE', 'AdminApiController', 'deleteCategory');

//$router->addRoute('Productos', 'GET', 'ProductsApiController', 'getProducts'); // Consigna 2
//$router->addRoute('Productos/:Categoria', 'GET', 'ProductsApiController', 'getProductsByCategory');
//$router->addRoute('Productos/:Categoria/:Producto', 'GET', 'ProductsApiController', 'getProductsByCategory');

// rutea
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
?>