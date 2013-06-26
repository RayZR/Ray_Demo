<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 24/05/13
 * Time: 3:33 PM
 * To change this template use File | Settings | File Templates.
 */

class val {

    public function __construct(){

    }


    public function minLength($data,$arg){
        if(strlen($data)<$arg){
            return "Your String can only be $arg long";
        }

    }


    public function maxLength($data,$arg){
        if(strlen($data)>$arg){
            return "Your String can only be $arg long";
        }

    }

    public function ValInteger($data){
        if(ctype_digit($data)==false){
            return "Your input has to be numbers";
        }

    }

    public function valEmail($data){
        if(filter_var($data, FILTER_VALIDATE_EMAIL)==false){
            return "Your input has to be valid email address";
        }

    }

    public function __call($name,$arg){
        throw new Exception("$name does not exist in ".__CLASS__);
    }



}