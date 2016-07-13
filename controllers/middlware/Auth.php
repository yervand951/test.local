<?php

class Auth{
    public $auth;
    public function __construct($id = true)
    {
        return $this->login($id);
    }

    private function login($id){
        if(isset($_SESSION['id'])){
            return $this->auth = true;
        }else{
            header( 'Location: http://test.local/views/auth/login.php' );
            require_once('views/auth/login.php');
            exit();
        }

    }
}