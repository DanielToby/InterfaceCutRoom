<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jobs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
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
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
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

                        <?php
                        require "schedulingEngine.php";
                        if (array_key_exists('get_best_schedule', $_POST)) {
                        ?>
                            <script>
                                var job_id_json = <?php echo json_encode(get_best_schedule()); ?>;
                                $.ajax({
                                    url: "CRUD/updateOrder.php",
                                    method: "POST",
                                    data: {
                                        job_id_array: job_id_json
                                    },
                                });
                            </script>
                        <?php
                            header("Refresh:0");
                        }
                        ?>
                        
                        <form method="post">
                            <input type="submit" name="get_best_schedule" class="btn btn-primary pull-right" value="Generate Best Schedule" />
                        </form>
                        <script>
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.href);
                            }
                        </script>
                    </div>
                    <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>Priority</th>
                                <th>Name</th>
                                <th>Job ID</th>
                                <th>Estimated Execution Time</th>
                            </tr>
                        </thead>
                        <tbody class="row_order">
                            <?php
                            // Include config file
                            require "config.php";
                            // Attempt select query execution
                            $sql = "SELECT * FROM jobs ORDER BY order1";
                            if ($jobs = mysqli_query($link, $sql)) {
                                if (mysqli_num_rows($jobs) > 0) {
                                    while ($job = $jobs->fetch_assoc()) {
                            ?>
                                        <tr id="<?php echo $job['id'] ?>">
                                            <td><?php echo $job['order1'] ?></td>
                                            <td><?php echo $job['name'] ?></td>
                                            <td><?php echo $job['id'] ?></td>
                                            <td><?php echo $job['TDT'] ?></td>
                                        </tr>
                            <?php   }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(".row_order").sortable({
        update: function() {
            var job_id_array = new Array();
            $('.row_order>tr').each(function() {
                job_id_array.push($(this).attr("id"));
            });
            $.ajax({
                url: "CRUD/updateOrder.php",
                method: "POST",
                data: {
                    job_id_array: job_id_array
                },
                success: function() {
                    location.reload();
                }
            });

        }
    });
</script>

</html>