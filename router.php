<?php
require_once 'database/config.php';
require_once 'libs/Router.php';

require_once 'app/controllers/admin.api.controller.php';
require_once 'app/controllers/products.api.controller.php';


$router = new Router();


$router->setDefaultRoute('ProductsApiController', 'show404'); 

//                      ENDPOINT             verbo          controller           metodo
$router->addRoute('Administrador/Productos', 'GET', 'AdminApiController', 'getProducts'); 
$router->addRoute('Administrador/Productos/:ID', 'GET', 'AdminApiController', 'getProducts'); 
$router->addRoute('Administrador/Productos', 'POST', 'AdminApiController', 'insertProduct'); 
$router->addRoute('Administrador/Productos/:ID', 'PUT', 'AdminApiController', 'updateProduct');  
$router->addRoute('Administrador/Productos/:ID', 'DELETE', 'AdminApiController', 'deleteProduct');
$router->addRoute('Administrador/Categorias', 'GET', 'AdminApiController', 'getCategorys'); 
$router->addRoute('Administrador/Categorias/:ID', 'GET', 'AdminApiController', 'getCategorys'); 
$router->addRoute('Administrador/Categorias', 'POST', 'AdminApiController', 'insertCategory');   
$router->addRoute('Administrador/Categorias/:ID', 'PUT', 'AdminApiController', 'updateCategory');   
$router->addRoute('Administrador/Categorias/:ID', 'DELETE', 'AdminApiController', 'deleteCategory');


$router->addRoute('Productos', 'GET', 'ProductsApiController', 'getProducts'); 
$router->addRoute('Productos/:Categoria', 'GET', 'ProductsApiController', 'getProductsByParams');
$router->addRoute('Productos/:Categoria?sort=price&order=asc', 'GET', 'ProductsApiController', 'getProductsByCategoryAsc');
$router->addRoute('Productos/:Categoria?sort=price&order=desc', 'GET', 'ProductsApiController', 'getProductsByCategoryDesc');
$router->addRoute('Productos/:Categoria/:Producto', 'GET', 'ProductsApiController', 'getProductByParams');


$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
?>