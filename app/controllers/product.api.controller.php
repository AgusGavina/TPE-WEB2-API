<?php
require_once 'app/models/product.model.php';
require_once 'app/controllers/api.controller.php';
class ProductApiController extends ApiController
{
    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = new productModel();
    }
    function getProducts($params = [])
    {
        if(empty($params)){
            $products = $this->model->getProducts();
            return $this->view->response($products, 200);
        }
        else{
            $product = $this->model->getProduct($params[":ID"]);
            if(!empty($product)){
                return $this->view->response($product, 200);
            }
            else {
                $this->view->response('Product id='.$params[':ID'].' doesnt exist', 404);
            }
        }
    }
    function deleteProduct($params = []){
        $product_id = $params[':ID'];
        $product = $this->model->getProduct($product_id);
        if($product){
            $this->model->deleteProduct($product_id);
            $this->view->response('Product id='.$product_id.' successfully deleted', 200);
        }
        else{
            $this->view->response('Product id='.$product_id.' not found', 404);
        }
    }
    function addProduct($params = []){
        $body = $this->getData();

        $Product_name = $body->Product_name;
        $Price = $body-> Price;
        $Category_id = $body-> Category_id;
        $Milliliters = $body-> Milliliters;

        $id = $this->model->insertProduct($Product_name, $Milliliters, $Price, $Category_id);

        $this->view->response('Product successfully added id=0'.$id, 201);
    }
}
