<?php
/**
 * Created by JetBrains PhpStorm.
 * User: acer
 * Date: 26/06/13
 * Time: 6:55 PM
 * To change this template use File | Settings | File Templates.
 */

class displayCustomer extends Controller{
    public function __construct(){
        parent::__construct();
        Auth::checkLoggedIn();
    }
//@Param $pageNumber is use to choose page
    public function  index($pageNumber=0){
        $this->view->title='Customer';
        $rowsPerPage=15;//Use for pagination to decide how many rows per Page
        $result=$this->model->listCustomers($pageNumber,$rowsPerPage);
        $this->view->customers=$result[1];
        $this->view->totalPages=$result[0];
        $this->view->page=$pageNumber;
//        print_r($result[0]);
        $this->view->render('customer/index');
    }


}