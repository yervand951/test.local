<?php


class PostController {
    function index(){
        echo('post index');
    }

    function test($data = false){
        var_dump($data);
    }
}