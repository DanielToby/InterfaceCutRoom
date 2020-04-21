<?php
require_once 'DBController.php';
class Scheduling_Engine {
    private $db_handle;       

    function __construct() {
        $this->db_handle = new DBController();
    }

    function calculateCutSpreadTimes($scheduled_ids) {
        $ids = implode(",", $scheduled_ids);
        $sql = "SELECT * FROM JOB_ORDER WHERE id in ({$ids})" ;
        $orders = $this->db_handle->runBaseQuery($sql);
        foreach ($orders as $value) {
            // get associate CAD file
            $cadfile_id = $value['cadfile_id'];
            $sql = "SELECT * FROM CAD_FILE WHERE id = ?";
            $paramType = "i";
            $paramValue = array($cadfile_id);
            $result = $this->db_handle->runQuery($sql, $paramType, $paramValue);
            $cadfile = $result[0];

            $sql = "SELECT * FROM OPERATION_DATA";
            $result = $this->db_handle->runBaseQuery($sql);
            $operational_data = $result[0];

            // calculate cut time
            $MCMT = $cadfile['TCL'] / $operational_data['CV']; // minutes of conveyor move time
            $NCM = $cadfile['TCL'] / $operational_data['CLT']; // minutes of conveyor move setup time
            $MCMTS = $NCM * $operational_data['CLTS']; // minutes of conveyor move setup time
            $MCT = $cadfile['TCP1'] / $operational_data['CS']; // minutes of cut time
            $MPMT = $cadfile['TCP2'] * $operational_data['PMT']; // minutes of piece move time
    
            $TCT = ($MCMT + $MCMTS + $MCT + $MPMT + $operational_data['CST']) / $operational_data['OEF']; // total cutting time
            
            // calculate spread time
            $MMT = $operational_data['PST'] * $value['NM'] * 2; // minutes to deploy / take up markers
            $MNT = $operational_data['MST'] * $value['NM']; // minutes to mark ends and splice points
            $MUT = $operational_data['PST'] * $value['NM']; // minutes put down underlayment
            $MS = $value['TCY'] / $operational_data['SS']; // minutes of spread time
            $MT = $value['TCY'] / $operational_data['ST'] * $operational_data['STF']; // minutes of travel time
            $MRT = $cadfile['TCL'] * 0.5 * $value['TNR'] / $operational_data['ST']; // minutes of travel time to load rolls
            $MLT = $operational_data['MLR'] * ($value['TNR'] - 1); // minutes to load rolls
            $MCT = $operational_data['CRT'] * $operational_data['CRF']; //minutes of carriage rotation
            $MDT = $value['TCY'] / $operational_data['DY'] * $operational_data['DT']; // minutes for defects
        
        
            $XSST = ($operational_data['CST'] + $MMT + $MNT + $MUT + $operational_data['SSA']) / $operational_data['OEF']; // minutes of set up
            $XST = ($MS + $MT + $MRT + $MLT + $MCT + $MDT) / $operational_data['OEF']; // minutes of spreading time
            $TST = $XSST + $XST; // total spreading time

            $query = "UPDATE JOB_ORDER SET cut_time = ?, spread_time = ?, total_direct_time = ? WHERE id = ?";
            $paramType = "iiii";
            $paramValue = array(
                $TCT,
                $TST,
                $TCT + $TST,
                $value['id']
            );
            $spread_time = round($TST, 2);
            $cut_time = round($TCT, 2);
            $this->db_handle->update($query, $paramType, $paramValue);
            $times[] = "<strong>Order #{$value['id']}:</strong> Calculated Spread Time: <strong>{$spread_time} minutes</strong>, Calculated Cut Time: <strong>{$cut_time} minutes</strong>";
        }
        return $times;
    }

    function getOptimizedSchedule($scheduled_ids) {
        $ids = implode(",", $scheduled_ids);
        $sql = "SELECT * FROM JOB_ORDER WHERE id in ({$ids}) 
                    ORDER BY due_date DESC, user_priority DESC, total_direct_time ASC";
        $orders = $this->db_handle->runBaseQuery($sql);
        return $orders;
    }
}