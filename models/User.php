<?php
require_once ('Model.php');

class User extends Model{
    public function __construct()
    {
        parent::__construct('users');
    }

    public function allusers(){
        var_dump($this->select(['users.id','users.name'])->where([["users.id = '1'","users.name = 'yervand'","users.id = '2'"],
            ['OR','OR']])
            ->join(['Left','posts'])->on([['users.id = posts.id']])->orderBy('users.id DESC ')
            ->get());



//        $this->select(['id','name'])->where([["id = '1'","name = 'yervand'","id = '2'"],
//            ['OR','OR']])
//            ->join('jeft')->on([['user.id'=>'post.id'],['=']])
//            ->limit('5')->first();
        exit();

    }

    public function create($data){
        return $this->insert($data);
    }
    
    public function check($data){
        return $this->select(['id','name','email'])->where([$data,['AND']])->first();
    }
}