<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 14/05/13
 * Time: 2:28 PM
 * To change this template use File | Settings | File Templates.
 */

class bootstrap {
    private $_url=null;
    private $_Controller=null;

    private $_controllerPath="Controllers/";
    private $_modelPath="Models/";
    private $_errorFile="error.php";
    private $_defaultFile="Index.php";


    public function init(){
        $this->_getURL();

        //print_r($url);
        if(empty($this->_url[0])){
            $this->_loadDefaultController();
            return false;
        }


        $this->_loadExistingController();
        $this->_callControllerMethod();

    }


    public function setControllerPath($path){
        $this->_controllerPath=trim($path,'/').'/';
    }

    public function setModelPath($path){
        $this->_modelPath=trim($path,'/').'/';
    }
    public function setErrorFile($path){
        $this->_errorFile=trim($path,'/').'/';
    }

    public function setDefaultFile($path){
        $this->_defaultFile=trim($path,'/').'/';
    }

     private function _getURL(){
         $this->_url=isset($_GET['url'])?$_GET['url']:null;
         $this->_url=rtrim($this->_url,'/');
         $this->_url=filter_var($this->_url,FILTER_SANITIZE_URL);
         $this->_url=explode('/',$this->_url);

     }

    private function _loadExistingController(){
        $file=$this->_controllerPath.$this->_url[0].'.php';




        if(file_exists($file)){

            require $file;
            $this->_Controller=new $this->_url[0];
            $this->_Controller->loadModel($this->_url[0],$this->_modelPath);
        }
        else{

            $this->_error();
            return false;
        }

    }

    private function _loadDefaultController(){
        require $this->_controllerPath.$this->_defaultFile;
        $this->_Controller=new Index();
        $this->_Controller->loadModel("Index",$this->_modelPath);
        $this->_Controller->index();

    }


    private function _callControllerMethod(){
        $length=count($this->_url);

//        print_r($length);
      


        switch($length){
            case 5:
                $this->_Controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
                break;
            case 4:
                $this->_Controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
                break;
            case 3:
                $this->_Controller->{$this->_url[1]}($this->_url[2]);
                break;
            case 2:
                $this->_Controller->{$this->_url[1]}();
                break;
            default:
                $this->_Controller->index();


        }



        }


   private  function _error() {
        require $this->_controllerPath.$this->_errorFile;
        $controller = new error();

        $controller->index();
        exit;
    }

}

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}
