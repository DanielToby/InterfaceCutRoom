<?php
require_once 'DBController.php';
class Operation_Data {
    private $db_handle;       

    function __construct() {
        $this->db_handle = new DBController();
    }

    function editOperationData($table_a_length,$table_a_width,$table_b_length,$table_b_width,$time_remaining_table_pair,$cutter_position,$CS,$PMT,$CLT,$CV,$CLTS,$SS,$ST,$CRT,$CST,$OEF,$PST,$MST,$MLR,$DT,$SSA,$DY,$STF,$CRF) {
        $query = "UPDATE OPERATION_DATA SET table_a_length = ?,table_a_width = ?, table_b_length = ?, table_b_width = ?, time_remaining_table_pair = ?, cutter_position = ?, CS = ?, PMT = ?, CLT = ?,CV = ?,CLTS = ?,SS = ?,ST = ?,CRT = ?,CST = ?,OEF = ?,PST = ?,MST = ?,MLR = ?,DT = ?,SSA = ?,DY = ?,STF = ?,CRF = ? WHERE id = '1'";
        $paramType = "iiiifiiiiiiiiiiiiiiiiiss";
        $paramValue = array(
            $table_a_length,
            $table_a_width,
            
            $table_b_length,
            $table_b_width,
        
            $time_remaining_table_pair,
            $cutter_position,
        
            $CS,
            $PMT,
            $CLT,
            $CV,
            $CLTS,
            $SS,
            $ST,
            $CRT,
        
            $CST,
            $OEF,
            $PST,
            $MST,
            $MLR,
            $DT,
            $SSA,
            $DY,
        
            $STF,
            $CRF
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getOperationData() {
        $sql = "SELECT * FROM JOB_ORDER";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>