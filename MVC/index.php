<?php
error_reporting(E_ALL);
ini_set('display_errors', True);
require 'config.php';



spl_autoload_register(function($class){

    if(file_exists(LIBRARY.$class.".php"))
    {
        include LIBRARY.$class.".php";

    }

    if(file_exists("utl/".$class.".php"))
    {
        include "utl/".$class.".php";
    }

});

/*Here to set up controller and model directory. The default value is Controllers and Models.*/
$app=new bootstrap();
$app->setControllerPath('/controllers');
$app->setModelPath('/models');
$app->init();

?>

