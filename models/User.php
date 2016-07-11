<?php
require_once ('Model.php');

class User extends Model{
    public function __construct()
    {
        parent::__construct('users');
    }

    public function allusers(){
        $this->select(['id','name'])->where(['colum'=>['id','name','email'],'express'=>['=','>','<'],'value'=>['test-name','test-name','test-name'],'cond'=>['OR','AND']]);
    }
}