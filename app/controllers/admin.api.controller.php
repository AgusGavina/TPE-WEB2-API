<?php
require_once 'app/models/admin.model.php';
require_once 'app/controllers/api.controller.php';
class AdminApiController extends ApiController
{
    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = new AdminModel();
    }
    function showAdministrador(){
        $this->getProducts();
        $this->getCategorys();
    }
    function showError(){
        
    }
    //---------- PRODUCTOS ----------
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
    function updateProduct($params = []){
        $product_id = $params[":ID"];
        $product = $this->model->getProduct($product_id);

        if($product){
            $body = $this->getData();

            $Product_name = $body->Product_name;
            $Price = $body-> Price;
            $Category_id = $body-> Category_id;
            $Milliliters = $body-> Milliliters;

            $product = $this->model->updateProduct($Product_name, $Milliliters, $Price, $Category_id, $product_id);
            $this->view->response('Product successfully updated id='.$product_id, 200);
        }
        else{
            $this->view->response('Product id='.$product_id.' not found', 404);
        }
    }
    // ---------- CATEGORIAS ----------
    function getCategorys($params = [])
    {
        if(empty($params)){
            $categorys = $this->model->getCategorys();
            return $this->view->response($categorys, 200);
        }
        else{
            $category = $this->model->getCategory($params[":ID"]);
            if(!empty($category)){
                return $this->view->response($category, 200);
            }
            else {
                $this->view->response('Category id='.$params[':ID'].' doesnt exist', 404);
            }
        }
    }
    function deleteCategory($params = []){
        $category_id = $params[':ID'];
        $category = $this->model->getCategory($category_id);
        if($category){
            $this->model->deleteCategory($category_id);
            $this->view->response('Category id='.$category_id.' successfully deleted', 200);
        }
        else{
            $this->view->response('Category id='.$category_id.' not found', 404);
        }
    }
    function addCategory($params = []){
        $body = $this->getData();

        $Category_name = $body->Category_name;

        $id = $this->model->insertCategory($Category_name);

        $this->view->response('Category successfully added id=0'.$id, 201);
    }
    function updateCategory($params = []){
        $category_id = $params[":ID"];
        $category = $this->model->getCategory($category_id);

        if($category){
            $body = $this->getData();

            $Category_name = $body->Category_name;

            $category = $this->model->updateCategory($Category_name, $category_id);
            $this->view->response('Category successfully updated id='.$category_id, 200);
        }
        else{
            $this->view->response('Category id='.$category_id.' not found', 404);
        }
    }
}