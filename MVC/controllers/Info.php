<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 14/05/13
 * Time: 2:05 PM
 * To change this template use File | Settings | File Templates.
 */

class Info extends Controller{
    function __construct(){
        parent::__construct();
        //echo "we are in help<br/>";

    }
    function index(){
        $this->view->title='Info';

        $this->view->render("Info/index");

    }


}