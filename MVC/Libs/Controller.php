<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 14/05/13
 * Time: 2:50 PM
 * To change this template use File | Settings | File Templates.
 */

class Controller {

    function __construct(){
       // echo "Controller is created";
        $this->view=new View();

    }

   public function loadModel($name,$modelPath){
       $path=$modelPath.$name.'Model.php';
       if(file_exists($path)){
           require $modelPath.$name.'Model.php';
           $modelName=$name.'Model';
           $this->model=new $modelName();
       }

   }


}