<?php



class CommentController{
    function index(){
        echo('comment index');
    }
    function test($data = false){
        var_dump($data);
    }
}