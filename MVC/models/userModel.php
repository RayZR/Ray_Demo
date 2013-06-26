<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 14/05/13
 * Time: 3:48 PM
 * To change this template use File | Settings | File Templates.
 */

class userModel extends Model{

    function __construct(){

        parent::__construct();
    }

    public function userList()
    {

         return $this->db->select('SELECT id,login,role FROM users');

    }

    public function create($data){
       // print_r($data['login']);
        $this->db->insert('users',array(
            'login'=>$data['login'],
            'password'=>Hash::Create('sha256',$data['password'],HASH_PASSWORD_KEY),
            'role'=>$data['role']

        ));

    }


    public function editSave($data){
        //print_r($data['id']);
//        $sth=$this->db->prepare('UPDATE users
//        SET login=:login,password=:password,role=:role WHERE id=:id');

        $this->db->update('users',array(
            'login'=>$data['login'],
            'password'=>Hash::Create('sha256',$data['password'],HASH_PASSWORD_KEY),
            'role'=>$data['role'],


        ),"id=$data[id]");

    }

    public function listSingleUser($id){



             $returnArray= $this->db->select('SELECT id,login,role FROM users WHERE id=:id',array('id'=>$id));
        return $returnArray[0];
    }


    public function delete($id){

        $result=$this->db->select("SELECT role FROM users WHERE id=:id ",array('id'=>$id));
        $data=$result[0]['role'];
        if($data=='owner'){
            return false;
        }
        $this->db->delete('users',"id=$id");



    }

}