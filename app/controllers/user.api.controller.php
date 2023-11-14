<?php
require_once 'app/controllers/api.controller.php';
require_once 'app/helpers/auth.api.helper.php';
require_once 'app/models/user.model.php';
class UserApiController extends ApiController
{
    private $model;
    private $authHelper;

    function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    function getToken($params = [])
    {
        $basic = $this->authHelper->getAuthHeaders(); // Darnos el header 'Authorization:' 'Basic: base64(urs:pass)'
        if(empty($basic)) {
            return $this->view->response('No authentication header sent', 401);
        }

        $basic = explode(" ", $basic ); // ["Basic", "base64(usr:pass)"]
        if($basic[0] != "Basic") {
            return $this->view->response('Authentication headers are incorrect', 401);
        }

        $userpass = base64_decode($basic[1]); //userpass
        $userpass = explode(":", $userpass); // ["usr", "pass"]
        $user = $userpass[0];
        $pass = $userpass[1];

        $userdata = $this->model->getUser($user);

        if($userdata && password_verify($pass, $userdata->password)) {
            // Usuario es valido
            $token = $this->authHelper->createToken($userdata);
            return $this->view->response($token, 200);
        } else {
            $this->view->response('The user or password are incorrect', 401);
        }
    }
}
