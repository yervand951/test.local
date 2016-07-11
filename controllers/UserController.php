<?php
require_once ('models/User.php');

class UserController{
    private $model;
    public function __construct()
    {
        $this->model = new User();
    }

    function index(){
        echo('user index');
    }
    function test($data = false){
        $result = $this->model->allusers();
        var_dump($result);
        exit();

    }

}