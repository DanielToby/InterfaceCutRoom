<?php
// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$name = $brand = $cutter_speed = $order1 = "";
$name_err = $brand_err = $cutter_speed_err = "";

$TCP1 = $TCP2 = $TCL = "";
$TCP1_err = $TCP2_err = $TCL_err = "";

$CLTS = $CST = $COEF = "";
$CLTS_err = $CST_err = $COEF_err = "";

$CS = $PMT = $CLT = $CV = "";
$CS_err = $PMT_err = $CLT_err = $CV_err = "";

$TCT = $CCRC = "";
$TCT_err = $CCRC_err = "";

$MCMT = $NCM = $MCMTS = $MCT = $MPMT = "";
$MCMT_err = $NCM_err = $MCMTS_err = $MCT_err = $MPMT_err = "";

$SCST = $PST = $MST = $MLR = $DT = $SOEF = $SSA = $DY = "";
$SCST_err = $PST_err = $MST_err = $MLR_err = $DT_err = $SOEF_err = $SSA_err = $DY_err = "";

$SS = $ST = $CRT = "";
$SS_err = $ST_err = $CRT_err = "";

$NM = $TNR = $TCY = "";
$NM_err = $TNR_err = $TCY_err = "";

$STF = $CRF = "";
$STF_err = $CRF_err = "";

$MMT = $MNT = $MUT = $MS = $MT = $MRT = $MLT = $MCaT = $MDT = "";
$MMT_err = $MNT_err = $MUT_err = $MS_err = $MT_err = $MRT_err = $MLT_err = $MCaT_err = $MDT_err = "";

$XSST = $XST = $TST = $TDT = "";
$XSST_err = $XST_err = $TST_err = $TDT_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }

    // Validate brand
    $input_brand = trim($_POST["brand"]);
    if(empty($input_brand)){
        $brand_err = "Please enter an brand.";
    } else{
        $brand = $input_brand;
    }

    // Validate cutter_speed
    $input_cutter_speed = trim($_POST["cutter_speed"]);
    if(empty($input_cutter_speed)){
        $cutter_speed_err = "Please enter the speed of the cutter.";
    } elseif(!ctype_digit($input_cutter_speed)){
        $cutter_speed_err = "Please enter a positive integer value.";
    } else{
        $cutter_speed = $input_cutter_speed;
    }

    $input_TCP1 = trim($_POST["TCP1"]);
    if(empty($input_TCP1)){
        $TCP1_err = "Please enter the total of piece perimeters.";
    } elseif(!ctype_digit($input_TCP1)){
        $TCP1_err = "Please enter a positive integer value.";
    } else{
        $TCP1 = $input_TCP1;
    }

    $input_TCP2 = trim($_POST["TCP2"]);
    if(empty($input_TCP2)){
        $TCP2_err = "Please enter the total number of pieces.";
    } elseif(!ctype_digit($input_TCP2)){
        $TCP2_err = "Please enter a positive integer value.";
    } else{
        $TCP2 = $input_TCP2;
    }

    $input_TCL = trim($_POST["TCL"]);
    if(empty($input_TCL)){
        $TCL_err = "Please enter the length of the cut.";
    } elseif(!ctype_digit($input_TCL)){
        $TCL_err = "Please enter a positive integer value.";
    } else{
        $TCL = $input_TCL;
    }

    $input_CLTS = trim($_POST["CLTS"]);
    if(empty($input_CLTS)){
        $CLTS_err = "Please enter the cutter set up time.";
    } elseif(!ctype_digit($input_CLTS)){
        $CLTS_err = "Please enter a positive integer value.";
    } else{
        $CLTS = $input_CLTS;
    }

    $input_CST = trim($_POST["CST"]);
    if(empty($input_CST)){
        $CST_err = "Please enter the cut set up time.";
    } elseif(!ctype_digit($input_CST)){
        $CST_err = "Please enter a positive integer value.";
    } else{
        $CST = $input_CST;
    }

    $input_COEF = trim($_POST["COEF"]);
    if(empty($input_COEF)){
        $COEF_err = "Please enter the operation efficiency factor.";
    } elseif(!ctype_digit($input_COEF)){
        $COEF_err = "Please enter a positive integer value.";
    } else{
        $COEF = $input_COEF;
    }

    $input_CS = trim($_POST["CS"]);
    if(empty($input_CS)){
        $CS_err = "Please enter the cutting speed.";
    } elseif(!ctype_digit($input_CS)){
        $CS_err = "Please enter a positive integer value.";
    } else{
        $CS = $input_CS;
    }

    $input_PMT = trim($_POST["PMT"]);
    if(empty($input_PMT)){
        $PMT_err = "Please enter the move time from piece to piece.";
    } elseif(!ctype_digit($input_PMT)){
        $PMT_err = "Please enter a positive integer value.";
    } else{
        $PMT = $input_PMT;
    }

    $input_CLT = trim($_POST["CLT"]);
    if(empty($input_CLT)){
        $CLT_err = "Please enter the cut head linear travel ability.";
    } elseif(!ctype_digit($input_CLT)){
        $CLT_err = "Please enter a positive integer value.";
    } else{
        $CLT = $input_CLT;
    }

    $input_CV = trim($_POST["CV"]);
    if(empty($input_CV)){
        $CV_err = "Please enter the speed of the conveyer.";
    } elseif(!ctype_digit($input_CV)){
        $CV_err = "Please enter a positive integer value.";
    } else{
        $CV = $input_CV;
    }

    if(($TCL_err !== "") || ($CV_err !=="")){
        $MCMT_err = "Unable to calculate minutes of conveyer move time.";
    }else{
        $MCMT = $TCL / $CV;
    }

    if(!empty($TCL_err) || !empty($CLT_err)){
        $NCM_err = "Unable to calculate the number of conveyer moves.";
    }else{
        $NCM = ceil($TCL / $CLT);
    }

    if(!empty($NCM_err) || !empty($CLT_err)){
        $MCMTS_err = "Unable to calculate minutes of conveyer set up time.";
    }else{
        $MCMTS = $NCM * $CLTS;
    }

    if(!empty($TCP1_err) || !empty($CS_err)){
        $MCT_err = "Unable to calculate minutes of cut time.";
    }else{
        $MCT = $TCP1/$CS;
    }

    if(!empty($TCP2_err) || !empty($PMT_err)){
        $MPMT_err = "Unable to calculate minutes of piece moving time.";
    }else{
        $MPMT = $TCP2 * $PMT;
    }

    if(!empty($MCTM_err) || !empty($MCMTS_err) || !empty($MCT_err) || !empty($MPMT_err) || !empty($CST_err) || !empty($COEF_err)){
        $TCT_err = "Unable to calculate total cutting time.";
    }else{
        $TCT = ($MCMT + $MCMTS + $MCT + $MPMT + $CST) /$COEF;
    }

    if(!empty($TCL_err) || !empty($TCT_err)){
        $MCT_err = "Unable to calculate the cutting consumption rate for cut.";
    }else{
        $CCRC = $TCL/$TCT;
    }

    $input_SCST = trim($_POST["SCST"]);
    if(empty($input_SCST)){
        $SCST_err = "Please enter minutes per order to obtain markers.";
    } elseif(!ctype_digit($input_SCST)){
        $SCST_err = "Please enter a positive integer value.";
    } else{
        $SCST = $input_SCST;
    }

    $input_PST = trim($_POST["PST"]);
    if(empty($input_PST)){
        $PST_err = "Please enter minutes to deploy marker to table.";
    } elseif(!ctype_digit($input_PST)){
        $PST_err = "Please enter a positive integer value.";
    } else{
        $PST = $input_PST;
    }

    $input_MST = trim($_POST["MST"]);
    if(empty($input_MST)){
        $MST_err = "Please enter minutes per marker to mark splice points.";
    } elseif(!ctype_digit($input_MST)){
        $MST_err = "Please enter a positive integer value.";
    } else{
        $MST = $input_MST;
    }

    $input_MLR = trim($_POST["MLR"]);
    if(empty($input_MLR)){
        $MLR_err = "Please enter minutes to load roll.";
    } elseif(!ctype_digit($input_MLR)){
        $MLR_err = "Please enter a positive integer value.";
    } else{
        $MLR = $input_MLR;
    }

    $input_DT = trim($_POST["DT"]);
    if(empty($input_DT)){
        $DT_err = "Please enter minutes to cut out or mark defect.";
    } elseif(!ctype_digit($input_DT)){
        $DT_err = "Please enter a positive integer value.";
    } else{
        $DT = $input_DT;
    }

    $input_SOEF = trim($_POST["SOEF"]);
    if(empty($input_SOEF)){
        $SOEF_err = "Please enter operation efficiency factor.";
    } elseif(!ctype_digit($input_SOEF)){
        $SOEF_err = "Please enter a positive integer value.";
    } else{
        $SOEF = $input_SOEF;
    }

    $input_SSA = trim($_POST["SSA"]);
    if(empty($input_SSA)){
        $SSA_err = "Please enter minutes to adjust spreading machine.";
    } elseif(!ctype_digit($input_SSA)){
        $SSA_err = "Please enter a positive integer value.";
    } else{
        $SSA = $input_SSA;
    }

    $input_DY = trim($_POST["DY"]);
    if(empty($input_DY)){
        $DY_err = "Please enter the number of defects per yard.";
    } elseif(!ctype_digit($input_DY)){
        $DY_err = "Please enter a positive integer value.";
    } else{
        $DY = $input_DY;
    }

    $input_SS = trim($_POST["SS"]);
    if(empty($input_SS)){
        $SS_err = "Please enter spreading yards per minute.";
    } elseif(!ctype_digit($input_SS)){
        $SS_err = "Please enter a positive integer value.";
    } else{
        $SS = $input_SS;
    }

    $input_ST = trim($_POST["ST"]);
    if(empty($input_ST)){
        $ST_err = "Please enter spreader travel yards per minute.";
    } elseif(!ctype_digit($input_ST)){
        $ST_err = "Please enter a positive integer value.";
    } else{
        $ST = $input_ST;
    }

    $input_CRT = trim($_POST["CRT"]);
    if(empty($input_CRT)){
        $CRT_err = "Please enter the minutes per carriage rotation.";
    } elseif(!ctype_digit($input_CRT)){
        $CRT_err = "Please enter a positive integer value.";
    } else{
        $CRT = $input_CRT;
    }

    $input_NM = trim($_POST["NM"]);
    if(empty($input_NM)){
        $NM_err = "Please enter the number of markers.";
    } elseif(!ctype_digit($input_NM)){
        $NM_err = "Please enter a positive integer value.";
    } else{
        $NM = $input_NM;
    }

    $input_TNR = trim($_POST["TNR"]);
    if(empty($input_TNR)){
        $TNR_err = "Please enter the total number of rolls.";
    } elseif(!ctype_digit($input_TNR)){
        $TNR_err = "Please enter a positive integer value.";
    } else{
        $TNR = $input_TNR;
    }

    $input_TCY = trim($_POST["TCY"]);
    if(empty($input_TCY)){
        $TCY_err = "Please enter the total cut yards.";
    } elseif(!ctype_digit($input_TCY)){
        $TCY_err = "Please enter a positive integer value.";
    } else{
        $TCY = $input_TCY;
    }

    $input_STF = trim($_POST["STF"]);
    if(empty($input_STF)){
        $STF_err = "Please enter the spreader travel yards.";
    } elseif(!ctype_digit($input_STF)){
        $STF_err = "Please enter a positive integer value.";
    } else{
        $STF = $input_STF;
    }

    $input_CRF = trim($_POST["CRF"]);
    if(empty($input_CRF)){
        $CRF_err = "Please enter the carriage rotation factor.";
    } elseif(!ctype_digit($input_CRF)){
        $CRF_err = "Please enter a positive integer value.";
    } else{
        $CRF = $input_CRF;
    }

    if(!empty($PST_err) || !empty($NM_err)){
        $MMT_err = "Unable to calculate minutes to deploy markers.";
    }else{
        $MMT = $PST * $NM * 2;
    }

    if(!empty($MST_err) || !empty($NM_err)){
        $MNT_err = "Unable to calculate minutes to mark ends and splice points.";
    }else{
        $MNT = $MST * $NM;
    }

    if(!empty($PST_err) || !empty($NM_err)){
        $MUT_err = "Unable to calculate minutes to put down underlayments.";
    }else{
        $MUT = $PST * $NM;
    }

    if(!empty($TCY_err) || !empty($SS_err)){
        $MS_err = "Unable to calculate minutes of spread time.";
    }else{
        $MS = $TCY/$SS;
    }

    if(!empty($TCY_err) || !empty($ST_err) || !empty($STF_err)){
        $MT_err = "Unable to calculate minutes of travel time.";
    }else{
        $MT = $TCY /$ST * $STF;
    }

    if(!empty($TCL_err) || !empty($TNR_err) || !empty($ST_err)){
        $MRT_err = "Unable to calculate minutes of travel time to load rolls.";
    }else{
        $MRT = ($TCL * 0.5) * $TNR / $ST;
    }

    if(!empty($MLR_err) || !empty($TNR_err)){
        $MLT_err = "Unable to calculate minutes to load rolls.";
    }else{
        $MLT = $MLR * ($TNR - 1);
    }

    if(!empty($CRT_err) || !empty($CRF_err)){
        $MCaT_err = "Unable to calculate minutes of carriage rotation.";
    }else{
        $MCaT = $CRT * $CRF;
    }

    if(!empty($TCY_err) || !empty($DY_err) || !empty($DT_err)){
        $MDT_err = "Unable to calculate minutes for defects.";
    }else{
        $MDT = $TCY /$DT * $DT;
    }

    if(!empty($CST_err) || !empty($MMT_err) || !empty($MNT_err) || !empty($MUT_err) || !empty($SSA_err) || !empty($SOEF_err)){
        $XSST_err = "Unable to calculate minutes of spread set up time.";
    }else{
        $XSST = ($CST + $MMT + $MNT + $MUT + $SSA) / $SOEF;
    }

    if(!empty($MS_err) || !empty($MT_err) || !empty($MRT_err) || !empty($MLT_err) || !empty($MCT_err) || !empty($MDT_err) || !empty($SOEF_err)){
        $XST_err = "Unable to calculate minutes of spreading time.";
    }else{
        $XST = ($MS + $MT + $MRT + $MLT + $MCT + $MDT) / $SOEF;
    }

    if(!empty($XSST_err) || !empty($XST_err)){
        $TST_err = "Unable to calculate total spreading time.";
    }else{
        $TST = $XSST + $XST;
    }

    if(!empty($TST_err) || !empty($TCT_err)){
        $TDT_err = "Unable to calculate total direct time.";
    }else{
        $TDT = $TST + $TCT;
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($brand_err) && empty($cutter_speed_err) && empty($order1_err) && empty($TCP1_err) && empty($TCP2_err) && empty($TCL_err) && empty($CLTS_err) && empty($CST_err) && empty($COEF_err) && empty($CS_err) && empty($PMT_err) && empty($CLT_err) && empty($CV_err) && empty($SCST_err) && empty($PST_err) && empty($MST_err) && empty($MLR_err) && empty($DT_err) && empty($SOEF_err) && empty($SSA_err) && empty($DY_err) && empty($SS_err) && empty($ST_err) && empty($CRT_err) && empty($NM_err) && empty($TNR_err) && empty($TCY_err) && empty($STF_err) && empty($CRF_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO jobs (
          name,
          brand,
          order1,
          cutter_speed,
          TCP1,
          TCP2,
          TCL,
          CLTS,
          CST,
          COEF,
          CS,
          PMT,
          CLT,
          CV,
          TCT,
          CCRC,
          MCMT,
          NCM,
          MCMTS,
          MCT,
          MPMT,
          SCST,
          PST,
          MST,
          MLR,
          DT,
          SOEF,
          SSA,
          DY,
          SS,
          ST,
          CRT,
          NM,
          TNR,
          TCY,
          STF,
          CRF,
          MMT,
          MNT,
          MUT,
          MS,
          MT,
          MRT,
          MLT,
          MCaT,
          MDT,
          XSST,
          XST,
          TST,
          TDT) VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssssssssssssssssssssss",
              $param_name,
              $param_brand,
              $param_cutter_speed,
              $param_order1,
              $param_TCP1,
              $param_TCP2,
              $param_TCL,
              $param_CLTS,
              $param_CST,
              $param_COEF,
              $param_CS,
              $param_PMT,
              $param_CLT,
              $param_CV,
              $param_TCT,
              $param_CCRC,
              $param_MCMT,
              $param_NCM,
              $param_MCMTS,
              $param_MCT,
              $param_MPMT,
              $param_SCST,
              $param_PST,
              $param_MST,
              $param_MLR,
              $param_DT,
              $param_SOEF,
              $param_SSA,
              $param_DY,
              $param_SS,
              $param_ST,
              $param_CRT,
              $param_NM,
              $param_TNR,
              $param_TCY,
              $param_STF,
              $param_CRF,
              $param_MMT,
              $param_MNT,
              $param_MUT,
              $param_MS,
              $param_MT,
              $param_MRT,
              $param_MLT,
              $param_MCaT,
              $param_MDT,
              $param_XSST,
              $param_XST,
              $param_TST,
              $param_TDT);

            // Set parameters
            $param_name = $name;
            $param_brand = $brand;
            $param_cutter_speed = $cutter_speed;
            $param_order1 = -1;
            $param_TCP1 = $TCP1;
            $param_TCP2 = $TCP2;
            $param_TCL = $TCL;
            $param_CLTS = $CLTS;
            $param_CST = $CST;
            $param_COEF = $COEF;
            $param_CS = $CS;
            $param_PMT = $PMT;
            $param_CLT = $CLT;
            $param_CV = $CV;
            $param_TCT = $TCT;
            $param_CCRC = $CCRC;
            $param_MCMT = $MCMT;
            $param_NCM = $NCM;
            $param_MCMTS = $MCMTS;
            $param_MCT = $MCT;
            $param_MPMT = $MPMT;
            $param_SCST = $SCST;
            $param_PST = $PST;
            $param_MST = $MST;
            $param_MLR = $MLR;
            $param_DT = $DT;
            $param_SOEF = $SOEF;
            $param_SSA = $SSA;
            $param_DY = $DY;
            $param_SS = $SS;
            $param_ST = $ST;
            $param_CRT = $CRT;
            $param_NM = $NM;
            $param_TNR = $TNR;
            $param_TCY = $TCY;
            $param_STF = $STF;
            $param_CRF = $CRF;
            $param_MMT = $MMT;
            $param_MNT = $MNT;
            $param_MUT = $MUT;
            $param_MS = $MS;
            $param_MT = $MT;
            $param_MRT = $MRT;
            $param_MLT = $MLT;
            $param_MCaT = $MCaT;
            $param_MDT = $MDT;
            $param_XSST = $XSST;
            $param_XST = $XST;
            $param_TST = $TST;
            $param_TDT = $TDT;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }else {
          echo "Something's wrong with the query: " . mysqli_error($link);
        }


    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "What is your name?"> Name </span> </label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($brand_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "What is the name of the brand?">Brand</span></label>
                            <textarea name="brand" class="form-control"><?php echo $brand; ?></textarea>
                            <span class="help-block"><?php echo $brand_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($cutter_speed_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "What is the speed of the cutter?">Cutter Speed</span></label>
                            <input type="text" name="cutter_speed" class="form-control" value="<?php echo $cutter_speed; ?>">
                            <span class="help-block"><?php echo $cutter_speed_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TCP1_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "When given all the perimeters of each piece, find the sum."> Total of Piece Perimeters (inches) </span></label>
                            <input type="text" name="TCP1" class="form-control" value="<?php echo $TCP1; ?>">
                            <span class="help-block"><?php echo $TCP1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TCP2_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "How many different pieces need to be cut?">Total Number of Pieces in the Cut</span></label>
                            <input type="text" name="TCP2" class="form-control" value="<?php echo $TCP2; ?>">
                            <span class="help-block"><?php echo $TCP2_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TCL_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "How much linear space on the table this job will take.">Total Length of the Cut (inches)</span></label>
                            <input type="text" name="TCL" class="form-control" value="<?php echo $TCL; ?>">
                            <span class="help-block"><?php echo $TCL_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CLTS_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How long will it take to set up the cut head between each movement?">Set Up Time per Cut Head Movement (minutes)</span></label>
                            <input type="text" name="CLTS" class="form-control" value="<?php echo $CLTS; ?>">
                            <span class="help-block"><?php echo $CLTS_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CST_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "How long will it take set up for this cut?">Cut Set Up Time (minutes)</span></label>
                            <input type="text" name="CST" class="form-control" value="<?php echo $CST; ?>">
                            <span class="help-block"><?php echo $CST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($COEF_err)) ? 'has-error' : ''; ?>">
                            <label><span title="What is the efficiency of the cut room operation?">Operation Efficiency Factor of Cutter (percentile)</span></label>
                            <input type="text" name="COEF" class="form-control" value="<?php echo $COEF; ?>">
                            <span class="help-block"><?php echo $COEF_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CS_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How fast does the head cut?">Cutting Speed of Cutting Head (inches/minute)</span></label>
                            <input type="text" name="CS" class="form-control" value="<?php echo $CS; ?>">
                            <span class="help-block"><?php echo $CS_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($PMT_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How long does it take the head to move between pieces?">Move Time of Cut Head from Piece to Piece (minutes)</span></label>
                            <input type="text" name="PMT" class="form-control" value="<?php echo $PMT; ?>">
                            <span class="help-block"><?php echo $PMT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CLT_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "How far is the cut head able to move across the table?">Cut Head Linear Travel Ability (inches)</span></label>
                            <input type="text" name="CLT" class="form-control" value="<?php echo $CLT; ?>">
                            <span class="help-block"><?php echo $CLT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CV_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How fast does the cutter move?">Speed of the Conveyer (inches/minute)</span></label>
                            <input type="text" name="CV" class="form-control" value="<?php echo $CV; ?>">
                            <span class="help-block"><?php echo $CV_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SCST_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How long will it take to find the specific markers and review the cutting specifications?">Minutes per Order to Obtain Markers (minutes)</span></label>
                            <input type="text" name="SCST" class="form-control" value="<?php echo $SCST; ?>">
                            <span class="help-block"><?php echo $SCST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($PST_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How long will it take to place the markers?">Minutes to Deploy Markers (minutes)</span></label>
                            <input type="text" name="PST" class="form-control" value="<?php echo $PST; ?>">
                            <span class="help-block"><?php echo $PST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MST_err)) ? 'has-error' : ''; ?>">
                            <label><span title="For each marker, how long will it take to mark that point?">Minutes per Marker to Mark Splice Points (minutes)</span></label>
                            <input type="text" name="MST" class="form-control" value="<?php echo $MST; ?>">
                            <span class="help-block"><?php echo $MST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MLR_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How long does it take to load the fabric?">Minutes to Load Roll (minutes)</span></label>
                            <input type="text" name="MLR" class="form-control" value="<?php echo $MLR; ?>">
                            <span class="help-block"><?php echo $MLR_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($DT_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How long will it take to remove the defects?">Minutes to Cut Out or Mark Defect (minutes)</span></label>
                            <input type="text" name="DT" class="form-control" value="<?php echo $DT; ?>">
                            <span class="help-block"><?php echo $DT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SOEF_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How efficient is the cut room at spreading?">Operation Efficiency Factor for Spreading (percent)</span></label>
                            <input type="text" name="SOEF" class="form-control" value="<?php echo $SOEF; ?>">
                            <span class="help-block"><?php echo $SOEF_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SSA_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How long will it take to prepare the spreading machine?">Minutes to Adjust Spreading Machine (minutes)</span></label>
                            <input type="text" name="SSA" class="form-control" value="<?php echo $SSA; ?>">
                            <span class="help-block"><?php echo $SSA_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($DY_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "For each yard of fabric, how many defects?">Number of Defects per Yard</span></label>
                            <input type="text" name="DY" class="form-control" value="<?php echo $DY; ?>">
                            <span class="help-block"><?php echo $DY_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SS_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "How fast can the machine spread?">Spreading Rate (yards/minute)</span></label>
                            <input type="text" name="SS" class="form-control" value="<?php echo $SS; ?>">
                            <span class="help-block"><?php echo $SS_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ST_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "How fast does the spreader travel?">Spreader Travel (yards/minute)</span></label>
                            <input type="text" name="ST" class="form-control" value="<?php echo $ST; ?>">
                            <span class="help-block"><?php echo $ST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CRT_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "How long does it take for one rotation of the spreader?">Minutes per Carriage Rotation (minutes)</span></label>
                            <input type="text" name="CRT" class="form-control" value="<?php echo $CRT; ?>">
                            <span class="help-block"><?php echo $CRT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($NM_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How many different markers need to be placed on the fabric?">Number of Markers</span></label>
                            <input type="text" name="NM" class="form-control" value="<?php echo $NM; ?>">
                            <span class="help-block"><?php echo $NM_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TNR_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How many rolls need to be placed on the spreader?">Total Number of Rolls</span></label>
                            <input type="text" name="TNR" class="form-control" value="<?php echo $TNR; ?>">
                            <span class="help-block"><?php echo $TNR_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TCY_err)) ? 'has-error' : ''; ?>">
                            <label><span title="How long is the total length of the spread?">Total Cut Yards (yards)</span></label>
                            <input type="text" name="TCY" class="form-control" value="<?php echo $TCY; ?>">
                            <span class="help-block"><?php echo $TCY_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($STF_err)) ? 'has-error' : ''; ?>">
                            <label><span title="Put 0 if face to face and face up, 1 if face up and one directional.">Spreader Travel Yards Factor</span></label>
                            <input type="text" name="STF" class="form-control" value="<?php echo $STF; ?>">
                            <span class="help-block"><?php echo $STF_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CRF_err)) ? 'has-error' : ''; ?>">
                            <label><span title= "Put 0 if face to face and face up, total cut yards/ total cut length if face up.">Carriage Rotation Factor</span></label>
                            <input type="text" name="CRF" class="form-control" value="<?php echo $CRF; ?>">
                            <span class="help-block"><?php echo $CRF_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
