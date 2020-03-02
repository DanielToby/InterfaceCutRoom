<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        /* Add a black background color to the top navigation */
        .topnav {
        background-color: #333;
        overflow: hidden;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
        background-color: #6b1618;
        color: white;
        }

        /* Add a color to the active/current link */
        .topnav a.active {
        background-color: #ba2f31;
        color: white;
        }

        .btn-default {
        background-color: #ba2f31;
        color:#FFF;
        border-color: #ba2f31;
        }
    
        .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {    
        background-color: #942325;
        color:#FFF;
        border-color: #942325;
        }

        body
        {
            margin:0;
            padding:0;
            background-color:#f1f1f1;
        }
        .box
        {
            width:600px;
            padding:20px;
            background-color:#fff;
            border:1px solid #ccc;
            border-radius:5px;
            margin-top:25px;
        }
        #job_list li
        {
            padding:16px;
            background-color:#f9f9f9;
            border:1px dotted #ccc;
            cursor:move;
            margin-top:12px;
        }
        #job_list li.ui-state-highlight
        {
            padding:24px;
            background-color:#ffffcc;
            border:1px dotted #ccc;
            cursor:move;
            margin-top:12px;
        }
    </style>
</head>
<body>
    <!-- header -->
    <div class="topnav">
        <a href="index.php">Home</a>
        <a class="active" href="schedule.php">Schedule</a>
        <a href="#ADDME">Settings</a>
    </div> 
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Schedule</h2> 
                    </div>
                    <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Order</th>
                            </tr>
                        </thead>
                        <tbody class="row_order">
                            <?php 
                            // Include config file
                            require_once "config.php";
                            
                            // Attempt select query execution
                            $sql = "SELECT * FROM jobs ORDER BY order1";
                            if($jobs = mysqli_query($link, $sql)){
                                if(mysqli_num_rows($jobs) > 0){
                                    while($job = $jobs->fetch_assoc()){
                                    ?>
                                        <tr  id="<?php echo $job['id'] ?>">
                                            <td><?php echo $job['id'] ?></td>
                                            <td><?php echo $job['name'] ?></td>
                                            <td><?php echo $job['order1'] ?></td>
                                        </tr>
                                    <?php }
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $( ".row_order" ).sortable({
        delay: 150,
        update: function() {
            var job_id_array = new Array();
            $('.row_order>tr').each(function() {
                job_id_array.push($(this).attr("id"));
            });
            $.ajax({
                url:"CRUD/updateOrder.php",
                method:"POST",
                data:{job_id_array:job_id_array},
                success:function(){
                    alert('Order successfully Updated');
                }
            });
        }
    });
</script>
</html>
