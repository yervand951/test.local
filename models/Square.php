<?php
require_once ('Model.php');

class Square extends Model
{
    public function __construct()
    {
        parent::__construct('square');
    }

    public function create($data){
        if(!$this->select(['*'])->where([['aquere_id'=>$data['id']]])->first()){

            return $this->insert(['aquere_id'=>$data['id'],'pleft'=>$data['left'],'ptop'=>$data['top'],'user_id'=>$_SESSION['id'],'color'=>$data['color']]);
        }
        return $this->edit($data);
    }

    public function edit($data){

        return $this->update(['aquere_id',$data['id']], ['aquere_id'=>$data['id'],'pleft'=>$data['left'],'ptop'=>$data['top'],'user_id'=>$_SESSION['id'],'color'=>$data['color']]);
    }

    public function getAll()
    {
        return $this->select(['*'])->get();
    }
}