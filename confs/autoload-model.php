<?php


function __autoload($class){
    if(file_exists('models/'.$class.'.php')){
        require_once ('models/'.$class.'.php');
    }else{

        require_once ('views/404.html');
        exit();
    }
}