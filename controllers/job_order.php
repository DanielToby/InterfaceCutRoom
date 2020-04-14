<?php
require_once 'DBController.php';
class Job_Order {
    private $db_handle;       

    function __construct() {
        $this->db_handle = new DBController();
    }

    function addOrder($due_date, $user_priority, $nm, $tnr, $tcy) {
        $query = "INSERT INTO JOB_ORDER (due_date, user_priority, NM, TNR, TCY) VALUES (?, ?, ?, ?, ?)";
        $paramType = "siiii";
        $paramValue = array(
            $due_date,
            $user_priority,
            $nm, 
            $tnr,
            $tcy
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editOrder($order_id, $due_date, $user_priority, $nm, $tnr, $tcy) {
        $query = "UPDATE JOB_ORDER SET due_date = ?,user_priority = ?, NM = ?, TNR = ?, TCY = ? WHERE id = ?";
        $paramType = "siiiii";
        $paramValue = array(
            $due_date,
            $user_priority,
            $nm, 
            $tnr,
            $tcy,
            $order_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function deleteOrder($order_id) {
        $query = "DELETE FROM JOB_ORDER WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $order_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getOrderById($order_id) {
        $query = "SELECT * FROM JOB_ORDER WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $order_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllOrders() {
        $sql = "SELECT * FROM JOB_ORDER ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>