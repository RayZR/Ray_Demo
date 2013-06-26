<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 19/05/13
 * Time: 8:49 PM
 * To change this template use File | Settings | File Templates.
 */

class Session {
    public static function init(){
        @session_start();
    }

    public static function set($key,$value){
        $_SESSION[$key]=$value;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){

            return $_SESSION[$key];
        }
    }
    public static function destroy(){
        session_destroy();
    }



}