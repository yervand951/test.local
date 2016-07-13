<?php
require_once ('models/User.php');

class UserController{
    private $model;
    public function __construct()
    {
        $this->model = new User();
    }

    function index(){
        require_once('views/user/user.php');
    }
    function test($data = false){
        $result = $this->model->allusers();
        var_dump($result);
        exit();

    }

    public function profile(){
        require_once('views/user/user.php');
    }



    public function logout(){
        session_destroy();
        $auth = new AuthController();
        $auth->getlogin();
        return;

    }

}