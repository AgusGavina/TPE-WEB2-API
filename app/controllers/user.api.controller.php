<?php
require_once 'app/controllers/api.controller.php';
class UserApiController extends ApiController
{
    function showIndex(){
        $this->view->viewIndex();
    }
}
?>