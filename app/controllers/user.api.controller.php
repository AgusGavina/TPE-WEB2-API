<?php
require_once 'app/controllers/api.controller.php';
class UserApiController extends ApiController
{
    function showHome(){
        $this->view->viewHome();
    }
}
?>