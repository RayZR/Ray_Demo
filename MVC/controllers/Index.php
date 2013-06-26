<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 14/05/13
 * Time: 2:01 PM
 * To change this template use File | Settings | File Templates.
 */

class Index extends Controller{

    function __construct(){
        parent::__construct();
      // echo "aaa";
        $this->view->js=array('Index/js/default.js','Index/js/jquery.cycle.all.min.js');
        $this->view->css=array('Index/css/default.css');


    }
    function index(){
        $this->view->title='Home';
       // echo Hash::create('sha256','ray',HASH_PASSWORD_KEY);
        $this->view->imageList=$this->model->listDir();
        $this->view->render("Index/index");

    }


}