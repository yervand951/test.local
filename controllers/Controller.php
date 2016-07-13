<?php
//require_once('confs/autoload-model.php');

class Controller{
    public function __construct()
    {
    }
    
    public function validator($data){
        $Errdata = '';
        $intgeger = 0;
            foreach ($data as $value) {
                $count = count($value);

                for($int = 0 ; $int < $count; $int++) {

                    if($intgeger == 0){
                        if (!preg_match("/^[a-zA-Z]*$/", $value[$int]) || !strlen($value[$int]) >= '3') {

                            return $Errdata .= "Only letters";
                        }
                    }

                    if($intgeger == 1){
                        if (!filter_var($value[$int], FILTER_VALIDATE_EMAIL)) {
                            return $Errdata .= "Invalid email format";
                        }
                    }
                    if($intgeger == 2) {
                        if($value != 0){
                            continue;
                        }
                        if (!strlen($value[$int]) >= '8' || isset($value[1]) || $value[$int] != $value[1]) {
                            return $Errdata .= "Your Password Must Contain At Least 8 Characters!";
                        }
                    }
                }

                $intgeger++;
            }
        return false;
    }
    
    
}