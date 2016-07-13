<?php
require_once('Controller.php');
require_once ('models/Square.php');


    class SquareController extends Controller{
    private $model;
    public function __construct()
    {
        $this->model = new Square();
    }

        function index(){
            echo('square index');
        }

    public function add($data = false){
        $data = $_POST;
        $this->model->create($data);
        return ;
    }
        
        public function getAll(){
            return $this->model->getAll();
        }
}