<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 27/05/13
 * Time: 8:37 PM
 * To change this template use File | Settings | File Templates.
 */

class CVModel extends Model{

    function __construct(){
        parent::__construct();
    }

    function upload($data){

            if(move_uploaded_file($data['tmp_name'],'public/upload/'.$data['name'])){
                echo $data['name'];
                return true;
            }
    }

    function listDir(){
        $dir=glob('public/upload/*');
        return $dir;
    }

    function deleteFile(){
        $dir=$_POST['dir'];
        unlink($dir);

           die();

    }


    public function xhrInsert(){
        $text=$_POST["text"];
        $this->db->insert("data",array('text'=>$text));
        $data=array('text'=>$text,'id'=>$this->db->lastInsertId());
        echo json_encode($data);

    }

    public function xhrGetListing(){

        $data=$this->db->select("SELECT * FROM data");
        echo json_encode($data);
        exit;
    }

    public function xhrDeleteListing(){
        $id=(int)$_POST["id"];
        $this->db->delete('data',"id=$id");



    }

}