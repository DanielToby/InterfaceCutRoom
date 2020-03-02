<?php
//updateOrder.php
$connect = mysqli_connect("localhost", "root", "", "cutroom_db");
//$job_id = $_POST["job_id_array"];
for($i=0; $i<count($_POST["job_id_array"]); $i++)
{
    $query = "
    UPDATE jobs 
    SET order1 = '".$i."' 
    WHERE id = '".$_POST["job_id_array"][$i]."'";
    mysqli_query($connect, $query);
}
echo 'Job Order has been updated'; 
?>