<?php
require_once('confs/db.php');

class Model {
    public $model;
    private $request;
    public function __construct($model = users)
    {
        $this->model = $model;
    }
    
    public function select($data){
        $this->request['select'] = 'SELECT ';
        foreach ($data as $item){
            $this->request['select'] .= $item .',';
        }
        $this->request['select'] .= ' FROM '. $this->model .' ';
        return $this;
    }
    public function where($data){
        $this->request['whrere'] .= 'WHERE ';
        $count = count($data['value']);
        for ($int = 0; $int < $count; $int++){
            $this->request['whrere'] .= $data['colum'][$int] . ' ';
            $this->request['whrere'] .= $data['express'][$int] . ' ';
            $this->request['whrere'] .= $data['value'][$int] . ' ';
            if(isset($data['cond'][$int])){
                $this->request['whrere'] .= $data['cond'][$int] . ' ';
            }

        }
        var_dump($this->request);
        exit();
    }

    public function on($data){
        $count = count($data);
        foreach ($data['values'] as $key => $value){
            $this->request['on'] .= $key . ' ';
            $this->request['on'] .= $data['express'] . ' ';
            $this->request['on'] .= $value . ' , ';
        }
        return $this;
    }
    
    public function join($data){
        $this->request['join'] .= $data[0] . ' ';
        $this->request['join'] .= $data[1] . ' ';
        return $this;
    }
    
    public function orderBy($data){
        $this->request['orderBy'] .= ' Order By '.$data;
        return $this;
    }
    
    public function groupBy($data){
        $this->request['groupBy'] .= ' groupBy '.$data;
        return $this;
    }
    
    public function limit($data){
        $this->request['limit'] .= ' LIMIT ';
        $count = count($data);
        for($int = 0; $int <= $count;$int++){
            $this->request['limit'] .= $data[$int] . ' , ';
        }
        return $this;
    }
    public function offset($data){
        $this->request['offset'] .= ' OFFSET ' . $data;
        return $this;
    }
    
    public function   get(){
        $sql = 
    }
    
    public function first(){
        
    }
}