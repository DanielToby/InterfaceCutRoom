<?php

class Default_Table {
    var $tablename;         // table name
    var $dbname;            // database name
    var $rows_per_page;     // used in pagination
    var $pageno;            // current page number
    var $lastpage;          // highest page number
    var $fieldlist;         // list of fields in this table
    var $data_array;        // data from the database
    var $errors;            // array of error messages

    function Default_Table () {
        $this->tablename       = 'default';
        $this->dbname          = 'cutroom_db';
    
        $this->fieldlist = array('column1', 'column2', 'column3');
        $this->fieldlist['column1'] = array('pkey' => 'y');
    }

    function getData($where) {
        require_once "config.php";
        $this->data_array = array();
        $this->numrows   = 0;
        $this->lastpage  = 0;
        global $query;
        if (empty($where)) {
            $where_str = NULL;
        } else {
            $where_str = "WHERE $where";
        }

        $query = "SELECT * FROM $this->tablename $where_str";
        if ($result = mysqli_query($link, $sql)) {
            $this->numrows = mysqli_num_rows($result);
            while ($row = $result->fetch_row()) {
                $this->data_array[] = $row;
            }
        }

        $result->close();
        return $this->data_array;
    }


    function insertRecord ($fieldarray) {
        require_once "config.php";

        $fieldlist = $this->fieldlist;
        foreach ($fieldarray as $field => $fieldvalue) {
            if (!in_array($field, $fieldlist)) {
                unset ($fieldarray[$field]);
            }
        }
        $query = "INSERT INTO $this->tablename SET ";
        foreach ($fieldarray as $item => $value) {
            $query .= "$item='$value', ";
        }
        $query = rtrim($query, ', ');
        
        $result = mysqli_query($link, $query);
        return;
    }

    function updateRecord ($fieldarray) {
        require_once "config.php";
        $this->errors = array();
    
        $fieldlist = $this->fieldlist;
        foreach ($fieldarray as $field => $fieldvalue) {
            if (!in_array($field, $fieldlist)) {
                unset ($fieldarray[$field]);
            } 
        } 

        $where  = NULL;
        $update = NULL;
        foreach ($fieldarray as $item => $value) {
            if (isset($fieldlist[$item]['pkey'])) {
                $where .= "$item='$value' AND ";
            } else {
                $update .= "$item='$value', ";
            } 
        } 

        $where  = rtrim($where, ' AND ');
        $update = rtrim($update, ', ');

        $query = "UPDATE $this->tablename SET $update WHERE $where";
        $result = mysqli_query($link, $query);
      
        return;
    }
}