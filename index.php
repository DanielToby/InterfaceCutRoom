<?php
// index.php

// load and initialize any global libraries
require_once 'controllers/DBController.php';
require_once 'controllers/job_order.php';
require_once 'controllers/operation_data.php';
require_once 'controllers/cad_file.php';

$action = "";
if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case "job_order-add":
        if (isset($_POST['add'])) {
            $due_date_timestamp = strtotime($_POST['due_date']);
            $due_date = date("Y-m-d", $due_date_timestamp);
            $user_priority = $_POST['user_priority'];
            $nm = $_POST['nm'];
            $tnr = $_POST['tnr'];
            $tcy = $_POST['tcy'];

            $order = new Job_Order();
            $insertId = $order->addOrder($due_date, $user_priority, $nm, $tnr, $tcy);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: index.php");
            }
        }
        require_once 'views/job_order-add.php';
        break;

        case "job_order-read":
            $order_id = $_GET["id"];
            $order = new Job_Order();
            
            $result = $order->getOrderById($order_id);
            require_once 'views/job_order-read.php';
            break;

    case "job_order-edit":
        $order_id = $_GET["id"];
        $order = new Job_Order();
        
        if (isset($_POST['add'])) {
            $due_date_timestamp = strtotime($_POST["due_date"]);
            $due_date = date("Y-m-d", $due_date_timestamp);
            $user_priority = $_POST['user_priority'];
            $nm = $_POST['nm'];
            $tnr = $_POST['tnr'];
            $tcy = $_POST['tcy'];
            
            $order->editOrder($order_id, $due_date, $user_priority, $nm, $tnr, $tcy);
            header("Location: index.php");
        }
        
        $result = $order->getOrderById($order_id);
        require_once 'views/job_order-edit.php';
        break;

    case "job_order-delete":
        $order_id = $_GET["id"];
        $order = new Job_Order();

        $order->deleteOrder($order_id);

        $result = $order->getAllOrders();
        require_once 'views/job_orders.php';
        break;

    case "cad_file-add":
        if (isset($_POST['add'])) {
            $tcp1 = $_POST['tcp1'];
            $tcp2 = $_POST['tcp2'];
            $tcl = $_POST['tcl'];

            $cadfile = new CAD_File();
            $insertId = $cadfile->addCadFile($tcp1, $tcp2, $tcl);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: index.php?action=cad_files");
            }
        }
        require_once 'views/cad_file-add.php';
        break;
    
    case "cad_file-read":
        $cadfile_id = $_GET["id"];
        $cadfile = new CAD_File();
        
        $result = $cadfile->getCadFileById($order_id);
        require_once 'views/cad_file-read.php';
        break;
    
    case "cad_file-edit":
        $cadfile_id = $_GET["id"];
        $cadfile = new CAD_File();
        
        if (isset($_POST['add'])) {
            $tcp1 = $_POST['tcp1'];
            $tcp2 = $_POST['tcp2'];
            $tcl = $_POST['tcl'];
            
            $cadfile->editCadFile($cadfile_id, $tcp1, $tcp2, $tcl);
            header("Location: index.php?action=cad_files");
        }
        
        $result = $cadfile->getCadFileById($cadfile_id);
        require_once 'views/cad_file-edit.php';
        break;
    
    case "cad_file-delete":
        $cadfile_id = $_GET["id"];
        $cadfile = new CAD_File();

        $cadfile->deleteCadFile($cadfile_id);

        $result = $cadfile->getAllCadFiles();
        require_once 'views/cad_files.php';
        break;

    case "cad_files":
        $cadfile = New CAD_File();
        $result = $cadfile->getAllCadFiles();
        require_once 'views/cad_files.php';
        break;

    case "operation_data":
        $od = new Operation_Data();
        
        if (isset($_POST['add'])) {
            $table_a_length = $_POST['table_a_length'];
            $table_a_width = $_POST['table_a_width'];
            $table_b_length = $_POST['table_b_length'];
            $table_b_width = $_POST['table_b_width'];
            $time_remaining_table_pair = $_POST['time_remaining_table_pair'];
            $cutter_position = $_POST['cutter_position'];
            $CS = $_POST['CS'];
            $PMT = $_POST['PMT'];
            $CLT = $_POST['CLT'];
            $CV = $_POST['CV'];
            $CLTS = $_POST['CLTS'];
            $SS = $_POST['SS'];
            $ST = $_POST['ST'];
            $CRT = $_POST['CRT'];
            $CST = $_POST['CST'];
            $OEF = $_POST['OEF'];
            $PST = $_POST['PST'];
            $MST = $_POST['MST'];
            $MLR = $_POST['MLR'];
            $DT = $_POST['DT'];
            $SSA = $_POST['SSA'];
            $DY = $_POST['DY'];
            $STF = $_POST['STF'];
            $CRF = $_POST['CRF'];
            
            $od->editOperationData($table_a_length,$table_a_width,$table_b_length,$table_b_width,$time_remaining_table_pair,$cutter_position,$CS,$PMT,$CLT,$CV,$CLTS,$SS,$ST,$CRT,$CST,$OEF,$PST,$MST,$MLR,$DT,$SSA,$DY,$STF,$CRF);
            header("Location: index.php?action=operation_data");
        }
        
        $result = $od->getOperationData();
        require_once 'views/operation_data-edit.php';
        break;
    
    default:
        $order = New Job_Order();
        $result = $order->getAllOrders();
        require_once 'views/job_orders.php';
        break;
     
}
?>