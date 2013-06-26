<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 14/05/13
 * Time: 2:56 PM
 * To change this template use File | Settings | File Templates.
 */

class View {
    function __construct(){
    // echo "Here is the view";
    }

    public function render($name,$noInclude=false){
        if($noInclude==false){
    require 'Views/header.php';
    require 'Views/'.$name.'.php';
    require 'Views/footer.php';
    }
     else{
            $strPara=explode('/',$name);
            require 'Views/'.$strPara[0].'/inc/header.php';
            require 'Views/'.$name.'.php';
            require 'Views/'.$strPara[0].'/inc/footer.php';
     }
    }

}