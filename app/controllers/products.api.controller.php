<?php
require_once 'app/models/product.model.php';
require_once 'app/controllers/api.controller.php';
class ProductsApiController extends ApiController
{
    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = new ProductModel();
    }

    function getProducts()
    {
        $products = $this->model->getProducts();
        return $this->view->response($products, 200);
    }

    function getProductsByCategory($params = [])
    {
        $category = $this->model->getCategory($params[':Categoria']);
        if (!empty($category)) {
            if (!empty($params[':Producto'])) {
                $product = $this->model->getProductById($params[':Producto']);
                if (!empty($product)) {
                    if ($product[0]->Category_id == $params[':Categoria']) {
                        return $this->view->response($product, 200);
                    } else {
                        $this->view->response('Product id=' . $params[':Producto'] . ' doesnt belong to the category', 404);
                    }
                } else {
                    $this->view->response('Product id=' . $params[':Producto'] . ' doesnt exist', 404);
                }
            } else {
                $products = $this->model->getProductsByCategory($params[':Categoria']);
                if (!empty($products)) {
                    return $this->view->response($products, 200);
                } else {
                    $this->view->response('Category id=' . $params[':Categoria'] . ' doesnt have products', 404);
                }
            }
        } else {
            $this->view->response('Category id=' . $params[':Categoria'] . ' doesnt exist', 404);
        }
    }
}
