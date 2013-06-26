<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 24/05/13
 * Time: 8:23 PM
 * To change this template use File | Settings | File Templates.
 */

class Auth {
    public static function checkLoggedIn(){
        @session_start();
        $logged=$_SESSION['loggedIn'];
        //print_r($logged);
        if($logged==false){

            session_destroy();
            header("location:".URL."login");

            exit;
        }
    }

}