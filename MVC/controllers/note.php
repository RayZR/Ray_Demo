<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 24/05/13
 * Time: 8:34 PM
 * To change this template use File | Settings | File Templates.
 */

class note extends Controller{
    function __construct(){
        parent::__construct();
        Auth::checkLoggedIn();
        $this->view->js=array('note/js/default.js');
    }

    public function index(){
        $this->view->title='Note';
        $data=array();
        $data['userId']=Session::get('userId');

        $this->view->noteList=$this->model->noteList($data);

        $this->view->render('note/index');


    }

    public function create(){
        $data=array();
        $data['title']=$_POST['title'];
        $data['content']=$_POST['content'];
        $data['userId']=Session::get('userId');
        date_default_timezone_set('Australia/Sydney');
        $data['date']=date('Y-m-d h:i:s ', time());
//        echo $data['date'];
//
//        die();

        $this->model->create($data);
        header('location:'.URL.'note');

    }

    public function edit($id){
        $this->view->title='Edit Note';
        $this->view->note=$this->model->listSingleNote($id);

        $this->view->render('note/edit');


    }

    public function editSave($id){
        $data=array();
        $data['noteId']=$id;

        $data['title']=$_POST['title'];
        $data['content']=$_POST['content'];
        $data['userId']=Session::get('userId');
        $data['date']=date('Y-m-d h:i:s ', time());
        $this->model->editSave($data);
        header('location:'.URL.'note');
    }

    public function delete($id){
        $this->model->delete($id);
        header('location:'.URL.'note');
    }

}