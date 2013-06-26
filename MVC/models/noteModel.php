<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 14/05/13
 * Time: 3:48 PM
 * To change this template use File | Settings | File Templates.
 */

class noteModel extends Model{

    function __construct(){

        parent::__construct();
    }

    public function noteList($data)
    {

         return $this->db->select('SELECT * FROM note WHERE userId=:userId',array(
             "userId"=>$data['userId']
         ));

    }

    public function create($data){
//       print_r($data);

        $this->db->insert('note',array(
            'title'=>$data['title'],
            'userId'=>$data['userId'],
            'content'=>$data['content'],
            'date_edited'=>$data['date']
        ));


    }


    public function editSave($data){
        //print_r($data['id']);
//        $sth=$this->db->prepare('UPDATE users
//        SET login=:login,password=:password,role=:role WHERE id=:id');

        $this->db->update('note',array(
            'title'=>$data['title'],
            'content'=>$data['content'],
            'date_edited'=>$data['date'],
            'userId'=>$data['userId']

        ),"noteId=$data[noteId]");

    }

    public function listSingleNote($id){


//        echo $id;
//        print_r(array('noteId'=>$id));
        $returnArray= $this->db->select('SELECT * FROM note WHERE noteId=:noteId',array('noteId'=>$id));


        return $returnArray[0];
    }


    public function delete($id){

//        $result=$this->db->select("SELECT role FROM users WHERE noteId=:noteId ",array('noteId'=>$id));
//        $data=$result[0]['role'];

        $this->db->delete('note',"noteId=$id");



    }

}