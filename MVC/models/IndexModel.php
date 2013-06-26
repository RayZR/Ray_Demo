<?php
/**
 * Created by JetBrains PhpStorm.
 * User: acer
 * Date: 7/06/13
 * Time: 5:55 PM
 * To change this template use File | Settings | File Templates.
 */

class IndexModel extends Model{


        function listDir(){
            $data=$this->db->select("SELECT * FROM data ORDER BY id ASC");
            $response=array();
            $dir=glob('public/upload/*');
          for($i=0;$i<count($dir);$i++){
             $response[$data[$i]["text"]]=$dir[$i];
          }


           return $response;
        }

}