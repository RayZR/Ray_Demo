<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 17/05/13
 * Time: 6:17 PM
 * To change this template use File | Settings | File Templates.
 */

class Database extends PDO{

    public function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS){
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME,$DB_USER,$DB_PASS);
        //parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }
 //Use for selection
    public function select($sql,$array=array(),$fetchMode=PDO::FETCH_ASSOC){


        $sth=$this->prepare($sql);

        foreach($array as $key=>$value){
//          echo ":$key".$value;
             $sth->bindValue(":$key",$value);
        }

        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }


    public function insert($table,$data){
        ksort($data);


        $fieldNames=implode(',',array_keys($data));
        $fieldValues=':'.implode(',:',array_keys($data));

        $sth=$this->prepare("INSERT INTO $table ($fieldNames)VALUES ($fieldValues)");

        foreach($data as $key=>$value){
            $sth->bindValue(":$key",$value);
        }
        $sth->execute();


    }

    public function update($table,$data,$where){
        ksort($data);
        $fieldDetails= null;
        foreach($data as $key=>$value)
        {
            $fieldDetails.="$key=:$key,";
        }
        $fieldDetails=rtrim($fieldDetails,',');
        //echo $fieldDetails;
       // echo $where;
        // die;
        $sth=$this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach($data as $key=>$value){
            $sth->bindValue(":$key",$value);
        }

        $sth->execute();
    }

    public function delete($table,$where,$limit=1){
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");

    }
}