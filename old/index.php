<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jobs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
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

    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <!-- header -->
    <div class="topnav">
        <a class="active" href="index.php">Home</a>
        <a href="schedule.php">Schedule</a>
        <a href="#ADDME">Settings</a>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">CutRoom Job Database</h2>
                        <a href="CRUD/create.php" class="btn btn-primary pull-right">Create New Entry</a>
                    </div>
                    <form action="index.php" method="post">
                          <button type="submit" name="Read" title='Upload Job' data-toggle='tooltip'><span class='glyphicon glyphicon-upload'></span></button>
                          <button type="submit" name="Write" title='Download Job' data-toggle='tooltip'><span class='glyphicon glyphicon-download'></span></button>
                        </form>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM jobs";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Job ID</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Brand</th>";
                                        echo "<th>Estimated Execution Time</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['brand'] . "</td>";
                                        echo "<td>" . $row['TDT'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='CRUD/read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='CRUD/update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='CRUD/delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);

                    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['read']))
                      {
                      read_from_file();
                      }
                    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['write']))
                      {
                      write_to_file();
                      }
                    function write_to_file(){

                       // Ask Danny how to remove this link thing...
                        $link = mysqli_connect("localhost", "root", "", "cutroom_db");
                        $file = "./test.txt";
                        $f = fopen($file, 'w');
                        $sql = "SELECT * FROM jobs";
                        $result = mysqli_query($link, $sql);
                        while($row = mysqli_fetch_array($result))
                      {
                          $name = $row['name'];
                          $brand = $row['brand'];

                           $txt_to_write = "$name:$brand\n";
                          fwrite($f, $txt_to_write);


                        }
                        fclose($f);

                    }

                    function read_from_file(){
                      $file = "./test.txt";
                      $document = file_get_contents($file);
                      echo nl2br("$document");
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>