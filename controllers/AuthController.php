<?php

require_once('Controller.php');
require_once ('models/User.php');

class AuthController extends Controller{

    /**
     * AuthController constructor.
     */
    private $model;
    public function __construct()
    {
        $this->model = new User();
        parent::__construct();
    }
    
    public function login(){
        $data = $_POST;
        unset($_POST);
        $valid = $this->validator([
            [],
            [$data['email']],
            [$data['password']]
        ]);
        if($valid){
            var_dump($valid);
            exit();
        }
        $data['password'] = md5($data['password']);
        $result = $this->model->check(['email' => $data['email'],'password' => $data['password']]);
        if($result){
            $_SESSION['id'] =  $result['id'];
            $_SESSION['name'] =  $result['name'];
            $_SESSION['email'] =  $result['email'];
        }
        $user = new UserController();
        $user->profile();
    }

    public function signup(){
        $data = $_POST;
        unset($_POST);
        $valid = $this->validator([
                [$data['name']],
                [$data['email']],
                [$data['password'],$data['rpassword']]
            ]

        );
        if($valid){
            var_dump($valid);
            exit();
        }
        $data['password'] = md5($data['password']);
        $result = $this->model->create(['name'=>$data['name'],'email'=>$data['email'],'password'=>$data['password']]);
        if($result){
            echo 'You are secsess registers <a href="/auth/getlogin">Log In </a>';
        }

    }

    public function getlogin(){
        header( 'Location: http://test.local/views/auth/login.php' );
    }

    public function getsignup(){
        header( 'Location: http://test.local/views/auth/register.php' );
    }
}