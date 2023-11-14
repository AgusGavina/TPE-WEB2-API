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

    function show404($params = null)
    {
        $this->view->response("The requested resource does not exist", 404);
    }

    function getProducts()
    {
        $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
        $order = isset($_GET['order']) ? $_GET['order'] : null;
        $ordering = '';
        if(isset($sort)) {
            if(($sort == 'Price' || $sort == 'Product_name') && ($order == 'ASC' || $order == 'DESC')){
                $ordering = "ORDER BY ".$sort." ".$order;
            }
        }
        $products = $this->model->getProducts($ordering);

        return $this->view->response($products, 200);
    }

    function getProductsByParams($params = [])
    {
        $category = $this->model->getCategory($params[':Categoria']);
        if (!empty($category)) {
            if (!empty($params[':Producto'])) {
                $product = $this->model->getProductById($params[':Producto']);
                if (!empty($product)) {
                    if ($product[0]->Category_id == $params[':Categoria']) {
                        return $this->view->response($product[0], 200);
                    } else {
                        $this->view->response('Product id=' . $params[':Producto'] . ' doesnt belong to the category', 404);
                    }
                } else {
                    $this->view->response('Product id=' . $params[':Producto'] . ' doesnt exist', 404);
                }
            } else {
                $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
                $order = isset($_GET['order']) ? $_GET['order'] : null;
                $ordering = '';
                if(isset($sort)) {
                    if($sort == 'Price' && ($order == 'ASC' || $order == 'DESC')){
                        $ordering = "ORDER BY ".$sort." ".$order;
                    }
                }
                $products = $this->model->getProductsByCategory($params[':Categoria'], $ordering);
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
