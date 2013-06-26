<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 17/05/13
 * Time: 4:44 PM
 * To change this template use File | Settings | File Templates.
 */

class login extends Controller{
    function __construct(){
        parent::__construct();
        // echo "aaa";
        $this->view->css=array('login/css/default.css');
        $this->view->js=array('login/js/default.js');

    }
    function index(){
        $this->view->title='Login';
        //echo Hash::Create('md5','ray',HASH_KEY);

        $this->view->render("login/index");

    }

    function run(){
        $this->model->run();
    }

}