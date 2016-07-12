<?php


function __autoload($class){
    if(file_exists('controllers/'.$class.'.php')){
        require_once ('controllers/'.$class.'.php');
    }else{
        require_once ('views/404.html');
        exit();
    }
}