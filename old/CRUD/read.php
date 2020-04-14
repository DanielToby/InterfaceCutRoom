<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM jobs WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $name = $row["name"];
                $brand = $row["brand"];
                $cutter_speed = $row["cutter_speed"];
                $input_order1 = $row["order1"];
                $TCP1 = $row["TCP1"];
                $TCP2 = $row["TCP2"];
                $TCL = $row["TCL"];
                $CLTS = $row["CLTS"];
                $CST = $row["CST"];
                $COEF = $row["COEF"];
                $CS = $row["CS"];
                $PMT = $row["PMT"];
                $CLT = $row["CLT"];
                $CV = $row["CV"];
                $TCL = $row["TCL"];
                $MCMT = $row["MCMT"];
                $NCM = $row["NCM"];
                $MCMTS = $row["MCMTS"];
                $MCT = $row["MCT"];
                $MPMT = $row["MPMT"];
                $TCT = $row["TCT"];
                $CCRC = $row["CCRC"];
                $SCST = $row["SCST"];
                $PST = $row["PST"];
                $MST = $row["MST"];
                $MLR = $row["MLR"];
                $DT = $row["DT"];
                $SOEF = $row["SOEF"];
                $SSA = $row["SSA"];
                $DY = $row["DY"];
                $SS = $row["SS"];
                $ST = $row["ST"];
                $CRT = $row["CRT"];
                $NM = $row["NM"];
                $TNR = $row["TNR"];
                $TCY = $row["TCY"];
                $STF = $row["STF"];
                $CRF = $row["CRF"];
                $MMT = $row["MMT"];
                $MNT = $row["MNT"];
                $MUT = $row["MUT"];
                $MS = $row["MS"];
                $MT = $row["MT"];
                $MRT = $row["MRT"];
                $MLT = $row["MLT"];
                $MCaT = $row["MCaT"];
                $MDT = $row["MDT"];
                $XSST = $row["XSST"];
                $XST = $row["XST"];
                $TST = $row["TST"];
                $TDT = $row["TDT"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: ../error.php");
                exit();
            }

        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: ../error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <p class="form-control-static"><?php echo $row["brand"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Cutter Speed</label>
                        <p class="form-control-static"><?php echo $row["cutter_speed"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Order</label>
                        <p class="form-control-static"><?php echo $row["order1"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>TCP1</label>
                        <p class="form-control-static"><?php echo $row["TCP1"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>TCP2</label>
                        <p class="form-control-static"><?php echo $row["TCP2"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>TCL</label>
                        <p class="form-control-static"><?php echo $row["TCL"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>CLTS</label>
                        <p class="form-control-static"><?php echo $row["CLTS"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>CST</label>
                        <p class="form-control-static"><?php echo $row["CST"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>COEF</label>
                        <p class="form-control-static"><?php echo $row["COEF"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>CS</label>
                        <p class="form-control-static"><?php echo $row["CS"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>PMT</label>
                        <p class="form-control-static"><?php echo $row["PMT"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>CLT</label>
                        <p class="form-control-static"><?php echo $row["CLT"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>CV</label>
                        <p class="form-control-static"><?php echo $row["CV"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>TCL</label>
                        <p class="form-control-static"><?php echo $row["TCL"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>MCMT</label>
                        <p class="form-control-static"><?php echo $row["MCMT"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>NCM</label>
                        <p class="form-control-static"><?php echo $row["NCM"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>MCMTS</label>
                        <p class="form-control-static"><?php echo $row["MCMTS"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>MPMT</label>
                        <p class="form-control-static"><?php echo $row["MPMT"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>TCT</label>
                        <p class="form-control-static"><?php echo $row["TCT"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>CCRC</label>
                        <p class="form-control-static"><?php echo $row["CCRC"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>SCST</label>
                        <p class="form-control-static"><?php echo $row["SCST"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>PST</label>
                        <p class="form-control-static"><?php echo $row["PST"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>MST</label>
                        <p class="form-control-static"><?php echo $row["MST"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>MLR</label>
                        <p class="form-control-static"><?php echo $row["MLR"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>DT</label>
                        <p class="form-control-static"><?php echo $row["DT"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>SOEF</label>
                        <p class="form-control-static"><?php echo $row["SOEF"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>SSA</label>
                        <p class="form-control-static"><?php echo $row["SSA"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>DY</label>
                        <p class="form-control-static"><?php echo $row["DY"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>SS</label>
                        <p class="form-control-static"><?php echo $row["SS"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>ST</label>
                        <p class="form-control-static"><?php echo $row["ST"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>CRT</label>
                        <p class="form-control-static"><?php echo $row["CRT"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>NM</label>
                        <p class="form-control-static"><?php echo $row["NM"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>TNR</label>
                        <p class="form-control-static"><?php echo $row["TNR"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>TCY</label>
                        <p class="form-control-static"><?php echo $row["TCY"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>STF</label>
                        <p class="form-control-static"><?php echo $row["STF"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>CRF</label>
                        <p class="form-control-static"><?php echo $row["CRF"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>MMT</label>
                        <p class="form-control-static"><?php echo $row["MMT"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>MNT</label>
                        <p class="form-control-static"><?php echo $row["MNT"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>MUT</label>
                        <p class="form-control-static"><?php echo $row["MUT"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>MS</label>
                        <p class="form-control-static"><?php echo $row["MS"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>MT</label>
                        <p class="form-control-static"><?php echo $row["MT"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>MRT</label>
                        <p class="form-control-static"><?php echo $row["MRT"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>MLT</label>
                        <p class="form-control-static"><?php echo $row["MLT"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>MCaT</label>
                        <p class="form-control-static"><?php echo $row["MCaT"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>MDT</label>
                        <p class="form-control-static"><?php echo $row["MDT"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>XSST</label>
                        <p class="form-control-static"><?php echo $row["XSST"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>XST</label>
                        <p class="form-control-static"><?php echo $row["XST"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>TST</label>
                        <p class="form-control-static"><?php echo $row["TST"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>TDT</label>
                        <p class="form-control-static"><?php echo $row["TDT"]; ?></p>
                    </div>
                    
                    <p><a href="../index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
