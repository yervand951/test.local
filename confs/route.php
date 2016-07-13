<?php
session_start();

//var_dump($_GET);

require_once ('autoload.php');
if(!isset($_GET['path'])){
    $controller = new IndexController();
    $controller->index();

}else{
    $get = $_GET['path'];
    $pat = explode( '/', $get );
    $pat['0'] = mb_strtolower($pat['0']);
    require_once ('controllers/middlware/Auth.php');


    if($pat['0'] == 'user' || $pat['0'] =='post' || $pat[0] == 'square'){

        $auth = new Auth();
    }


        $cont = ucfirst($pat['0']) . 'Controller';

        $controller = new $cont;

        $params = false;

        if(!isset($pat['1'])){

            $controller->index();
        }else{
            $func = $pat['1'];
            if(isset( $pat['2'])){
                unset($pat['1'],$pat['0']);
                $params = $pat;
                if(method_exists($controller,$func)){
                    $controller->$func($params);
                }else{
                    header( 'Location: http://test.local/views/404.html' );
                }
            }else{
                if(method_exists($controller,$func)){
                    $controller->$func();
                }else{
                    header( 'Location: http://test.local/views/404.html' );
                }
            }
        }
}





