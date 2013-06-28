<?php
/**
 * Created by JetBrains PhpStorm.
 * User: acer
 * Date: 26/06/13
 * Time: 9:03 PM
 * To change this template use File | Settings | File Templates.
 */

class displayCustomerModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    //@Param the start point of Query
    //@Param rows Per page (decided in Controller)
    public function listCustomers($start,$rowsPerPage){
       $total= $this->db->select("SELECT COUNT(id) FROM mytable");
       $totalPages=ceil($total[0]['COUNT(id)']/$rowsPerPage);
       $queryRows=$start*$rowsPerPage;
       $result= $this->db->select("SELECT * FROM mytable LIMIT ".$queryRows.",".$rowsPerPage);
        return array($totalPages,$result);
    }

    public function searchString($string){
//        echo $string;
        $result=$this->db->select("SELECT * FROM mytable WHERE CustomerName LIKE '%".$string."%'");
        return $result;

    }

}