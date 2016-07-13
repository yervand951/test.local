<?php
require_once('confs/db.php');

class Model {
    private $model,$db;
    private $request = [
        'select' =>  '',
        'whrere'=>   '',
        'on'=>       '',
        'join'=>     '',
        'orderBy'=>  '',
        'groupBy'=>  '',
        'limit'=>    '',
        'offset'=>   ''
    ];
    public function __construct($model = 'users')
    {
        $conf = new DB();
        $this->db = $conf->conf;
        $this->model = $model;
    }
    public function insert($data){
        $sql = 'INSERT INTO ' .$this->model . ' ';
        $keys = '';
        $values = '';
        $int = 0;
        foreach ($data as $key => $value){
            $int == 0 ? $comma = "  " : $comma = ",";
            $keys .= $comma ."`". $key."`";
            $values .= $comma ."'". $value ."'";
            $int++;
        }
        $sql .= '('.$keys .') VALUES ('.$values.')';
        return $this->db->query($sql);
    }

    public function delete($ids){
        if(is_array($ids)){
            $sql = 'DELETE FROM ' . $this->model .' WHERE id IN' .$ids;
        }else{
            $sql = 'DELETE FROM ' . $this->model .' WHERE id = ' .$ids;
        }
        return $this->db->query($sql);

    }

    public function update($id,$data){

            $update = '';
            $int = 0;
            foreach ($data as $key => $value) {
                $int == 0 ? $comma = ' ' : $comma = ' , ';
                $update .= $comma;
                $update .= "`" . $key ."`";
                $update .= ' = ';
                $update .= "'". $value ."'";
                $update .= ' ';
                $int++;
            }
            if(is_integer($id)){
                $sql = 'UPDATE `' . $this->model . '` SET ' . $update . ' WHERE `id` = ' . $id;
            }else{
                $sql = 'UPDATE  ' . $this->model . ' SET ' . $update . ' WHERE `' . $id[0] .'` = ' . $id[1];
            }
        return $this->db->query($sql);
    }
    
    public function select($data){
        $this->request['select'] = 'SELECT ';
        $int = 0;
        foreach ($data as $item){
            $int == 0 ? $this->request['select'] .= '' : $this->request['select'] .= ',';
            $this->request['select'] .= $item ;

            $int++;
        }
        $this->request['select'] .= ' FROM '. $this->model .' ';
        return $this;
    }
    /*
     * Myqsl function bilder
     *
     * params: $data[0] = colum,$data[1] = express,$data[3] = value,data[3] = cond
     * return this OBJECT
     * */

    public function where($data ,$bool = false){
        $this->request['whrere'] .= 'WHERE ';
        $int = 0;
        if(!$bool){
            foreach ($data[0] as $key => $value){
                $this->request['whrere'] .= " `". $key . "` = '". $value . "' ";
                isset($data['1'][$int]) ? $this->request['whrere'] .= $data['1'][$int] . ' ' :  ' ';
                $int++;
            }
        }else{
            foreach ($data[0] as $value){
                $this->request['whrere'] .= $value . ' ';
                isset($data['1'][$int]) ? $this->request['whrere'] .= $data['1'][$int] . ' ' :  ' ';
                $int++;
            }
        }

        return $this;
    }

    /*
     * mysql function
     *
     * params data[0] = values,data[1] = express
     *
     * */

    public function on($data){
        $count = count($data);
        $this->request['on'] = ' ON ';
        $int = 0;
        foreach ($data['0'] as $key => $value){
            $int == 0 ? $this->request['select'] .= ' ' : $this->request['select'] .= ',';
            $this->request['on'] .= $value . ' ';
            $int++;
        }
        return $this;
    }
    
    public function join($data){
        $this->request['join'] .= $data[0] . ' ';
        $this->request['join'] .=  ' JOIN ';
        $this->request['join'] .= $data[1] . ' ';
        return $this;
    }
    
    public function orderBy($data){
        $this->request['orderBy'] .= ' ORDER BY '.$data . ' ';
        return $this;
    }
    
    public function groupBy($data){
        $this->request['groupBy'] .= ' GROUP BY '.$data . ' ';
        return $this;
    }
    
    public function limit($data){
        $this->request['limit'] .= ' LIMIT ';
        $count = count($data);
        for($int = 0; $int < $count;$int++){
            $int == 0 ? $this->request['limit'] .= '' : $this->request['limit'] .= ',';
            $this->request['limit'] .= $data[$int];
        }
        return $this;
    }
    public function offset($data){
        $this->request['offset'] .= ' offset ' . $data;
        return $this;
    }
    
    public function   get(){
        $sql =
            $this->request['select'] .
            $this->request['join'].
            $this->request['on'].
            $this->request['whrere'] .
            $this->request['limit'].
            $this->request['offset'].
            $this->request['groupBy'].
            $this->request['orderBy']
        ;
        $this->request = $this->unsetArray($this->request);
        $get = $this->db->query($sql);
        if(!$get){
            exit('no result');
        }
        $row = mysqli_fetch_all($get);
        return $row;
    }
    
    public function first(){
        $sql =
            $this->request['select'] .
            $this->request['join'].
            $this->request['on'].
            $this->request['whrere'] .
            $this->request['limit'].
            $this->request['offset'].
            $this->request['groupBy'].
            $this->request['orderBy']
        ;
        $this->request = $this->unsetArray($this->request);

        $get = $this->db->query($sql);
        if(!$get){
            exit('no result');
        }
        $row = $get->fetch_assoc();
        return $row;
    }

    private function unsetArray($data){
        foreach ($data as $key => $value){
            $data[$key] = '';
        }
        return $data;
    }
}