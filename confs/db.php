<?php

class DB{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'testlogin';
    public $conf;

    public function __construct()
    {
        $conf = new mysqli($this->servername,$this->username,$this->password,$this->db);
        if ($conf->connect_error) {
            die("Connection failed: " . $conf->connect_error);
        }
        $this->conf = $conf;
    }





}

?>