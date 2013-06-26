<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 22/05/13
 * Time: 9:26 PM
 * To change this template use File | Settings | File Templates.
 */
require "Form/val.php";
class Form {
    private $_currentItem=null;
    private $_postData=array();
    private $_val=array();
    private $_error=array();

    public function __construct(){
        $this->_val=new val();
    }

    public function post($field){
        $this->_postData[$field]=$_POST[$field];
        $this->_currentItem=$field;
        return $this;
    }

    public function fetch($fieldName=false){
        if($fieldName){
            if(isset($this->_postData[$fieldName])){
            return $this->_postData[$fieldName];
            }else{
                return false;
            }
        }else{
            return $this->_postData;
        }

    }

    public function val($typeOfValidation,$arg=null){

        if($arg==null){
            $result= $this->_val->{$typeOfValidation}($this->_postData[$this->_currentItem]);
        }else{
            $result= $this->_val->{$typeOfValidation}($this->_postData[$this->_currentItem],$arg);
        }

        if($result){
            $this->_error[$this->_currentItem]=$result;

        }

//       print_r($this->_error);
        return $this;
    }

    public function submit(){
        if(empty($this->_error)){
        return true;
        }else{
            $str='';
            foreach($this->_error as $key=>$value){
                $str .=$key.'=>'.$value."\n";
            }
            throw new Exception($str);
        }
    }

}