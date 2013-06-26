<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 17/05/13
 * Time: 6:23 PM
 * To change this template use File | Settings | File Templates.
 */

class loginModel extends Model{
    public function __construct(){
        parent::__construct();
        //echo md5('ray');

    }
    public function run(){
       $sth=$this->db->prepare("SELECT id,login,role FROM users WHERE login=:login AND password=:password");
        $sth->execute(array(
            ':login'=>$_POST['login'],
            ':password'=>Hash::Create('sha256',$_POST['password'],HASH_PASSWORD_KEY)
        ));
        $data=$sth->fetch();

        if( isset($_POST['remember_me']))
        {

            if($_POST['remember_me']=='on'){
                setcookie("login",$_POST['login'],time()+864000);
//                echo $_POST['remember_me'];
//                die();
            }

        }


        //$data=$sth->fetchAll();
       // print_r($data);
        $count=$sth->rowCount();
        //print_r($count);

        if($count>0){

            Session::init();
            Session::set('role',$data['role']);
            Session::set('loggedIn',true);
            Session::set('userId',$data['id']);
            Session::set('login',$data['login']);
            header("location:".URL."dashboard");
        }else{
            header("location:".URL."login");
        }

    }

}