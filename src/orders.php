<?php
include 'dbConn.php';

class Orders extends PDOConn{
    function getAll(){
        $result = $this->connect()->query('SELECT * FROM orders');
        return $result;
    }

    function getCompany($company){
        $result = $this->connect()->query('Select * from orders where company ='.$company);
        return $result;
    }   

    function getDate($date){
        $result = $this->connect()->query('Select * from orders where date >'.$date);
        return $result;
    }
}
?>