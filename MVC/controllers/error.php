<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 14/05/13
 * Time: 2:34 PM
 * To change this template use File | Settings | File Templates.
 */

class error extends Controller{
function __construct(){
    parent::__construct();

}
    function index(){
        $this->view->title='Error';
        $this->view->msg="This page doesn't exist";

        $this->view->render('error/index',true);

    }
}