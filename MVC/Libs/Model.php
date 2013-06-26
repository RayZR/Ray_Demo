<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 14/05/13
 * Time: 3:49 PM
 * To change this template use File | Settings | File Templates.
 */

class Model {
    function  __construct(){
        //echo 'help model';
        $this->db=new Database(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASS);
    }

}