<?php
require "../config.php";
for($i=0; $i<count($_POST["job_id_array"]); $i++)
{
    $query = "
    UPDATE jobs 
    SET order1 = '".$i."' 
    WHERE id = '".$_POST["job_id_array"][$i]."'";
    mysqli_query($link, $query);
}
echo 'Job Order Updated'; 
?>