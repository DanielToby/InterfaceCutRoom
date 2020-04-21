<?php
require_once 'DBController.php';
class CAD_File {
    private $db_handle;       

    function __construct() {
        $this->db_handle = new DBController();
    }

    function addCadFile($tcp1, $tcp2, $tcl) {
        $query = "INSERT INTO CAD_FILE (TCP1, TCP2, TCL) VALUES (?, ?, ?)";
        $paramType = "iii";
        $paramValue = array(
            $tcp1,
            $tcp2,
            $tcl
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editCadFile($cadfile_id, $tcp1, $tcp2, $tcl) {
        $query = "UPDATE CAD_FILE SET TCP1=?, TCP2=?, TCL=? WHERE id = ?";
        $paramType = "iiii";
        $paramValue = array(
            $tcp1,
            $tcp2,
            $tcl,
            $cadfile_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function deleteCadFile($cadfile_id) {
        $query = "DELETE FROM CAD_FILE WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $cadfile_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getCadFileById($cadfile_id) {
        $query = "SELECT * FROM CAD_FILE WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $cadfile_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllCadFiles() {
        $sql = "SELECT * FROM CAD_FILE ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getAllIDs() {
        $sql = "SELECT id FROM CAD_FILE";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>