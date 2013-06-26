<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 19/05/13
 * Time: 8:46 PM
 * To change this template use File | Settings | File Templates.
 */

class user extends Controller{

    function __construct(){
        parent::__construct();
        Auth::checkLoggedIn();
    }

    public function index(){
        $this->view->title='User';
        $this->view->userList=$this->model->userList();

        $this->view->render('user/index');


    }

    public function create(){
        $data=array();
        $data['login']=$_POST['login'];
        $data['password']=$_POST['password'];
        $data['role']=$_POST['role'];
        $this->model->create($data);
        header('location:'.URL.'user');

    }

    public function edit($id){
        $this->view->title='Edit User';
        $this->view->user=$this->model->listSingleUser($id);

        $this->view->render('user/edit');


    }

    public function editSave($id){
        $data=array();
        $data['id']=$id;
        $data['login']=$_POST['login'];
        $data['password']=$_POST['password'];
        $data['role']=$_POST['role'];
        $this->model->editSave($data);
        header('location:'.URL.'user');
    }

    public function delete($id){
        $this->model->delete($id);
        header('location:'.URL.'user');
    }


}