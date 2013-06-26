<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 19/05/13
 * Time: 8:46 PM
 * To change this template use File | Settings | File Templates.
 */

class dashboard extends Controller{

    function __construct(){
        parent::__construct();
        Auth::checkLoggedIn();
        //print_r($_SESSION);
        $this->view->js=array('dashboard/js/default.js');
    }

    function index(){
        $this->view->title='Dashboard';

        $this->view->render('dashboard/index');

    }

    function logout(){
        Session::destroy();
        header("location:".URL."login");
        exit;
    }



}