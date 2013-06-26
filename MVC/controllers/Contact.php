<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 30/05/13
 * Time: 5:13 PM
 * To change this template use File | Settings | File Templates.
 */

class Contact extends Controller{
 function __construct(){
     parent::__construct();
     $this->view->js=array('Contact/js/default.js');
     $this->view->css=array('Contact/css/default.css');
 }

    function index(){
        $this->view->render('Contact/index');
    }


    public function sendEmail(){

        $this->model->sendEmail();
    }

}