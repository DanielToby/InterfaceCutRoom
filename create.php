<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$name = $brand = $cutter_speed = $order1 = "";
$name_err = $brand_err = $cutter_speed_err = $order1_err = "";

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
    
    $input_order1 = trim($_POST["order1"]);
    if(empty($input_order1)){
        $order1_err = "Please enter the order.";     
    } elseif(!ctype_digit($input_order1)){
        $order1_err = "Please enter a positive integer value.";
    } else{
        $order1 = $input_order1;
    }

    $input_TCP1 = trim($_POST["TCP1"]);
    if(empty($input_TCP1)){
        $TCP1_err = "Please enter TCP1";     
    } elseif(!ctype_digit($input_TCP1)){
        $TCP1_err = "Please enter a positive integer value.";
    } else{
        $TCP1 = $input_TCP1;
    }

    $input_TCP2 = trim($_POST["TCP2"]);
    if(empty($input_TCP2)){
        $TCP2_err = "Please enter TCP2";     
    } elseif(!ctype_digit($input_TCP2)){
        $TCP2_err = "Please enter a positive integer value.";
    } else{
        $TCP2 = $input_TCP2;
    }

    $input_TCL = trim($_POST["TCL"]);
    if(empty($input_TCL)){
        $TCL_err = "Please enter TCL";     
    } elseif(!ctype_digit($input_TCL)){
        $TCL_err = "Please enter a positive integer value.";
    } else{
        $TCL = $input_TCL;
    }

    $input_CLTS = trim($_POST["CLTS"]);
    if(empty($input_CLTS)){
        $CLTS_err = "Please enter CLTS";     
    } elseif(!ctype_digit($input_CLTS)){
        $CLTS_err = "Please enter a positive integer value.";
    } else{
        $CLTS = $input_CLTS;
    }

    $input_CST = trim($_POST["CST"]);
    if(empty($input_CST)){
        $CST_err = "Please enter CST";     
    } elseif(!ctype_digit($input_CST)){
        $CST_err = "Please enter a positive integer value.";
    } else{
        $CST = $input_CST;
    }

    $input_COEF = trim($_POST["COEF"]);
    if(empty($input_COEF)){
        $COEF_err = "Please enter COEF";     
    } elseif(!ctype_digit($input_COEF)){
        $COEF_err = "Please enter a positive integer value.";
    } else{
        $COEF = $input_COEF;
    }

    $input_CS = trim($_POST["CS"]);
    if(empty($input_CS)){
        $CS_err = "Please enter CS";     
    } elseif(!ctype_digit($input_CS)){
        $CS_err = "Please enter a positive integer value.";
    } else{
        $CS = $input_CS;
    }

    $input_PMT = trim($_POST["PMT"]);
    if(empty($input_PMT)){
        $PMT_err = "Please enter PMT";     
    } elseif(!ctype_digit($input_PMT)){
        $PMT_err = "Please enter a positive integer value.";
    } else{
        $PMT = $input_PMT;
    }

    $input_CLT = trim($_POST["CLT"]);
    if(empty($input_CLT)){
        $CLT_err = "Please enter CLT";     
    } elseif(!ctype_digit($input_CLT)){
        $CLT_err = "Please enter a positive integer value.";
    } else{
        $CLT = $input_CLT;
    }

    $input_CV = trim($_POST["CV"]);
    if(empty($input_CV)){
        $CV_err = "Please enter CV";     
    } elseif(!ctype_digit($input_CV)){
        $CV_err = "Please enter a positive integer value.";
    } else{
        $CV = $input_CV;
    }

    $input_TCL = trim($_POST["TCL"]);
    if(empty($input_TCL)){
        $TCL_err = "Please enter TCL";     
    } elseif(!ctype_digit($input_TCL)){
        $TCL_err = "Please enter a positive integer value.";
    } else{
        $TCL = $input_TCL;
    }

    $input_MCMT = trim($_POST["MCMT"]);
    if(empty($input_MCMT)){
        $MCMT_err = "Please enter MCMT";     
    } elseif(!ctype_digit($input_MCMT)){
        $MCMT_err = "Please enter a positive integer value.";
    } else{
        $MCMT = $input_MCMT;
    }
    
    $input_NCM = trim($_POST["NCM"]);
    if(empty($input_NCM)){
        $NCM_err = "Please enter NCM";     
    } elseif(!ctype_digit($input_NCM)){
        $NCM_err = "Please enter a positive integer value.";
    } else{
        $NCM = $input_NCM;
    }

    $input_MCMTS = trim($_POST["MCMTS"]);
    if(empty($input_MCMTS)){
        $MCMTS_err = "Please enter MCMTS";     
    } elseif(!ctype_digit($input_MCMTS)){
        $MCMTS_err = "Please enter a positive integer value.";
    } else{
        $MCMTS = $input_MCMTS;
    }

    $input_MCT = trim($_POST["MCT"]);
    if(empty($input_MCT)){
        $MCT_err = "Please enter MCT";     
    } elseif(!ctype_digit($input_MCT)){
        $MCT_err = "Please enter a positive integer value.";
    } else{
        $MCT = $input_MCT;
    }

    $input_MPMT = trim($_POST["MPMT"]);
    if(empty($input_MPMT)){
        $MPMT_err = "Please enter MPMT";     
    } elseif(!ctype_digit($input_MPMT)){
        $MPMT_err = "Please enter a positive integer value.";
    } else{
        $MPMT = $input_MPMT;
    }

    $input_TCT = trim($_POST["TCT"]);
    if(empty($input_TCT)){
        $TCT_err = "Please enter TCT";     
    } elseif(!ctype_digit($input_TCT)){
        $TCT_err = "Please enter a positive integer value.";
    } else{
        $TCT = $input_TCT;
    }

    $input_CCRC = trim($_POST["CCRC"]);
    if(empty($input_CCRC)){
        $CCRC_err = "Please enter CCRC";     
    } elseif(!ctype_digit($input_CCRC)){
        $CCRC_err = "Please enter a positive integer value.";
    } else{
        $CCRC = $input_CCRC;
    }

    $input_SCST = trim($_POST["SCST"]);
    if(empty($input_SCST)){
        $SCST_err = "Please enter SCST";     
    } elseif(!ctype_digit($input_SCST)){
        $SCST_err = "Please enter a positive integer value.";
    } else{
        $SCST = $input_SCST;
    }

    $input_PST = trim($_POST["PST"]);
    if(empty($input_PST)){
        $PST_err = "Please enter PST";     
    } elseif(!ctype_digit($input_PST)){
        $PST_err = "Please enter a positive integer value.";
    } else{
        $PST = $input_PST;
    }

    $input_MST = trim($_POST["MST"]);
    if(empty($input_MST)){
        $MST_err = "Please enter MST";     
    } elseif(!ctype_digit($input_MST)){
        $MST_err = "Please enter a positive integer value.";
    } else{
        $MST = $input_MST;
    }

    $input_MLR = trim($_POST["MLR"]);
    if(empty($input_MLR)){
        $MLR_err = "Please enter MLR";     
    } elseif(!ctype_digit($input_MLR)){
        $MLR_err = "Please enter a positive integer value.";
    } else{
        $MLR = $input_MLR;
    }

    $input_DT = trim($_POST["DT"]);
    if(empty($input_DT)){
        $DT_err = "Please enter DT";     
    } elseif(!ctype_digit($input_DT)){
        $DT_err = "Please enter a positive integer value.";
    } else{
        $DT = $input_DT;
    }

    $input_SOEF = trim($_POST["SOEF"]);
    if(empty($input_SOEF)){
        $SOEF_err = "Please enter SOEF";     
    } elseif(!ctype_digit($input_SOEF)){
        $SOEF_err = "Please enter a positive integer value.";
    } else{
        $SOEF = $input_SOEF;
    }

    $input_SSA = trim($_POST["SSA"]);
    if(empty($input_SSA)){
        $SSA_err = "Please enter SSA";     
    } elseif(!ctype_digit($input_SSA)){
        $SSA_err = "Please enter a positive integer value.";
    } else{
        $SSA = $input_SSA;
    }

    $input_DY = trim($_POST["DY"]);
    if(empty($input_DY)){
        $DY_err = "Please enter DY";     
    } elseif(!ctype_digit($input_DY)){
        $DY_err = "Please enter a positive integer value.";
    } else{
        $DY = $input_DY;
    }

    $input_SS = trim($_POST["SS"]);
    if(empty($input_SS)){
        $SS_err = "Please enter SS";     
    } elseif(!ctype_digit($input_SS)){
        $SS_err = "Please enter a positive integer value.";
    } else{
        $SS = $input_SS;
    }

    $input_ST = trim($_POST["ST"]);
    if(empty($input_ST)){
        $ST_err = "Please enter ST";     
    } elseif(!ctype_digit($input_ST)){
        $ST_err = "Please enter a positive integer value.";
    } else{
        $ST = $input_ST;
    }

    $input_CRT = trim($_POST["CRT"]);
    if(empty($input_CRT)){
        $CRT_err = "Please enter CRT";     
    } elseif(!ctype_digit($input_CRT)){
        $CRT_err = "Please enter a positive integer value.";
    } else{
        $CRT = $input_CRT;
    }

    $input_NM = trim($_POST["NM"]);
    if(empty($input_NM)){
        $NM_err = "Please enter NM";     
    } elseif(!ctype_digit($input_NM)){
        $NM_err = "Please enter a positive integer value.";
    } else{
        $NM = $input_NM;
    }

    $input_TNR = trim($_POST["TNR"]);
    if(empty($input_TNR)){
        $TNR_err = "Please enter TNR";     
    } elseif(!ctype_digit($input_TNR)){
        $TNR_err = "Please enter a positive integer value.";
    } else{
        $TNR = $input_TNR;
    }

    $input_TCY = trim($_POST["TCY"]);
    if(empty($input_TCY)){
        $TCY_err = "Please enter TCY";     
    } elseif(!ctype_digit($input_TCY)){
        $TCY_err = "Please enter a positive integer value.";
    } else{
        $TCY = $input_TCY;
    }

    $input_STF = trim($_POST["STF"]);
    if(empty($input_STF)){
        $STF_err = "Please enter STF";     
    } elseif(!ctype_digit($input_STF)){
        $STF_err = "Please enter a positive integer value.";
    } else{
        $STF = $input_STF;
    }

    $input_CRF = trim($_POST["CRF"]);
    if(empty($input_CRF)){
        $CRF_err = "Please enter CRF";     
    } elseif(!ctype_digit($input_CRF)){
        $CRF_err = "Please enter a positive integer value.";
    } else{
        $CRF = $input_CRF;
    }

    $input_MMT = trim($_POST["MMT"]);
    if(empty($input_MMT)){
        $MMT_err = "Please enter MMT";     
    } elseif(!ctype_digit($input_MMT)){
        $MMT_err = "Please enter a positive integer value.";
    } else{
        $MMT = $input_MMT;
    }

    $input_MNT = trim($_POST["MNT"]);
    if(empty($input_MNT)){
        $MNT_err = "Please enter MNT";     
    } elseif(!ctype_digit($input_MNT)){
        $MNT_err = "Please enter a positive integer value.";
    } else{
        $MNT = $input_MNT;
    }

    $input_MUT = trim($_POST["MUT"]);
    if(empty($input_MUT)){
        $MUT_err = "Please enter MUT";     
    } elseif(!ctype_digit($input_MUT)){
        $MUT_err = "Please enter a positive integer value.";
    } else{
        $MUT = $input_MUT;
    }

    $input_MS = trim($_POST["MS"]);
    if(empty($input_MS)){
        $MS_err = "Please enter MS";     
    } elseif(!ctype_digit($input_MS)){
        $MS_err = "Please enter a positive integer value.";
    } else{
        $MS = $input_MS;
    }

    $input_MT = trim($_POST["MT"]);
    if(empty($input_MT)){
        $MT_err = "Please enter MT";     
    } elseif(!ctype_digit($input_MT)){
        $MT_err = "Please enter a positive integer value.";
    } else{
        $MT = $input_MT;
    }


    $input_MRT = trim($_POST["MRT"]);
    if(empty($input_MRT)){
        $MRT_err = "Please enter MRT";     
    } elseif(!ctype_digit($input_MRT)){
        $MRT_err = "Please enter a positive integer value.";
    } else{
        $MRT = $input_MRT;
    }

    $input_MLT = trim($_POST["MLT"]);
    if(empty($input_MLT)){
        $MLT_err = "Please enter MLT";     
    } elseif(!ctype_digit($input_MLT)){
        $MLT_err = "Please enter a positive integer value.";
    } else{
        $MLT = $input_MLT;
    }

    $input_MCaT = trim($_POST["MCaT"]);
    if(empty($input_MCaT)){
        $MCaT_err = "Please enter MCaT";     
    } elseif(!ctype_digit($input_MCaT)){
        $MCaT_err = "Please enter a positive integer value.";
    } else{
        $MCaT = $input_MCaT;
    }

    $input_MDT = trim($_POST["MDT"]);
    if(empty($input_MDT)){
        $MDT_err = "Please enter MDT";     
    } elseif(!ctype_digit($input_MNT)){
        $MDT_err = "Please enter a positive integer value.";
    } else{
        $MDT = $input_MDT;
    }

    $input_XSST = trim($_POST["XSST"]);
    if(empty($input_XSST)){
        $XSST_err = "Please enter XSST";     
    } elseif(!ctype_digit($input_XSST)){
        $XSST_err = "Please enter a positive integer value.";
    } else{
        $XSST = $input_XSST;
    }
    
    $input_XST = trim($_POST["XST"]);
    if(empty($input_XST)){
        $XST_err = "Please enter XST";     
    } elseif(!ctype_digit($input_XST)){
        $XST_err = "Please enter a positive integer value.";
    } else{
        $XST = $input_XST;
    }
    
    $input_TST = trim($_POST["TST"]);
    if(empty($input_TST)){
        $TST_err = "Please enter TST";     
    } elseif(!ctype_digit($input_TST)){
        $TST_err = "Please enter a positive integer value.";
    } else{
        $TST = $input_TST;
    }

    $input_TDT = trim($_POST["TDT"]);
    if(empty($input_TDT)){
        $TDT_err = "Please enter TDT";     
    } elseif(!ctype_digit($input_TDT)){
        $TDT_err = "Please enter a positive integer value.";
    } else{
        $TDT = $input_TDT;
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($brand_err) && empty($cutter_speed_err) && empty($order1_err) && empty($TCP1_err) && empty($TCP2_err) && empty($TCL_err) && empty($CLTS_err) && empty($CST_err) && empty($COEF_err) && empty($CS_err) && empty($PMT_err) && empty($CLT_err) && empty($CV_err) && empty($SCST_err) && empty($PST_err) && empty($MST_err) && empty($MLR_err) && empty($DT_err) && empty($SOEF_err) && empty($SSA_err) && empty($DY_err) && empty($SS_err) && empty($ST_err) && empty($CRT_err) && empty($NM_err) && empty($TNR_err) && empty($TCY_err) && empty($STF_err) && empty($CRF_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO jobs (name, brand, cutter_speed, order1, TCP1, TCP2, TCL, CLTS, CST, COEF, CS, PMT, CLT, CV, TCT, CCRC, MCMT, NCM, MCMTS, MCT, MPMT, SCST, PST, MST, MLR, DT, SOEF, SSA, DY, SS, ST, CRT, NM, TNR, TCY, STF, CRF, MMT, MNT, MUT, MS, MT, MRT, MLT, MCaT, MDT, XSST, XST, TST, TDT) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssssssssssssssssssssss", $param_name, $param_brand, $param_cutter_speed, $param_order1, $param_TCP1, $param_TCP2, $param_TCL, $param_CLTS, $param_CST, $param_COEF, $param_CS, $param_PMT, $param_CLT, $param_CV, $param_TCT, $param_CCRC, $param_MCMT, $param_NCM, $param_MCMTS, $param_MCT, $param_MPMT, $param_SCST, $param_PST, $param_MST, $param_MLR, $param_DT, $param_SOEF, $param_SSA, $param_DY, $param_SS, $param_ST, $param_CRT, $param_NM, $param_TNR, $param_TCY, $param_STF, $param_CRF, $param_MMT, $param_MNT, $param_MUT, $param_MS, $param_MT, $param_MRT, $param_MLT, $param_MCaT, $param_MDT, $param_XSST, $param_XST, $param_TST, $param_TDT);
            
            // Set parameters
            $param_name = $name;
            $param_brand = $brand;
            $param_cutter_speed = $cutter_speed;
            $param_order1 = $order1;
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
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
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
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($brand_err)) ? 'has-error' : ''; ?>">
                            <label>Brand</label>
                            <textarea name="brand" class="form-control"><?php echo $brand; ?></textarea>
                            <span class="help-block"><?php echo $brand_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($cutter_speed_err)) ? 'has-error' : ''; ?>">
                            <label>Cutter Speed</label>
                            <input type="text" name="cutter_speed" class="form-control" value="<?php echo $cutter_speed; ?>">
                            <span class="help-block"><?php echo $cutter_speed_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($order1_err)) ? 'has-error' : ''; ?>">
                            <label>Order</label>
                            <input type="text" name="order1" class="form-control" value="<?php echo $order1; ?>">
                            <span class="help-block"><?php echo $order1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TCP1_err)) ? 'has-error' : ''; ?>">
                            <label>TCP1</label>
                            <input type="text" name="TCP1" class="form-control" value="<?php echo $TCP1; ?>">
                            <span class="help-block"><?php echo $TCP1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TCP2_err)) ? 'has-error' : ''; ?>">
                            <label>TCP2</label>
                            <input type="text" name="TCP2" class="form-control" value="<?php echo $TCP2; ?>">
                            <span class="help-block"><?php echo $TCP2_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TCL_err)) ? 'has-error' : ''; ?>">
                            <label>TCL</label>
                            <input type="text" name="TCL" class="form-control" value="<?php echo $TCL; ?>">
                            <span class="help-block"><?php echo $TCL_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CLTS_err)) ? 'has-error' : ''; ?>">
                            <label>CLTS</label>
                            <input type="text" name="CLTS" class="form-control" value="<?php echo $CLTS; ?>">
                            <span class="help-block"><?php echo $CLTS_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CST_err)) ? 'has-error' : ''; ?>">
                            <label>CST</label>
                            <input type="text" name="CST" class="form-control" value="<?php echo $CST; ?>">
                            <span class="help-block"><?php echo $CST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($COEF_err)) ? 'has-error' : ''; ?>">
                            <label>COEF</label>
                            <input type="text" name="COEF" class="form-control" value="<?php echo $COEF; ?>">
                            <span class="help-block"><?php echo $COEF_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CS_err)) ? 'has-error' : ''; ?>">
                            <label>CS</label>
                            <input type="text" name="CS" class="form-control" value="<?php echo $CS; ?>">
                            <span class="help-block"><?php echo $CS_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($PMT_err)) ? 'has-error' : ''; ?>">
                            <label>PMT</label>
                            <input type="text" name="PMT" class="form-control" value="<?php echo $PMT; ?>">
                            <span class="help-block"><?php echo $PMT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CLT_err)) ? 'has-error' : ''; ?>">
                            <label>CLT</label>
                            <input type="text" name="CLT" class="form-control" value="<?php echo $CLT; ?>">
                            <span class="help-block"><?php echo $CLT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CV_err)) ? 'has-error' : ''; ?>">
                            <label>CV</label>
                            <input type="text" name="CV" class="form-control" value="<?php echo $CV; ?>">
                            <span class="help-block"><?php echo $CV_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TCT_err)) ? 'has-error' : ''; ?>">
                            <label>TCT</label>
                            <input type="text" name="TCT" class="form-control" value="<?php echo $TCT; ?>">
                            <span class="help-block"><?php echo $TCT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CCRC_err)) ? 'has-error' : ''; ?>">
                            <label>CCRC</label>
                            <input type="text" name="CCRC" class="form-control" value="<?php echo $CCRC; ?>">
                            <span class="help-block"><?php echo $CCRC_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MCMT_err)) ? 'has-error' : ''; ?>">
                            <label>MCMT</label>
                            <input type="text" name="MCMT" class="form-control" value="<?php echo $MCMT; ?>">
                            <span class="help-block"><?php echo $MCMT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($NCM_err)) ? 'has-error' : ''; ?>">
                            <label>NCM</label>
                            <input type="text" name="NCM" class="form-control" value="<?php echo $NCM; ?>">
                            <span class="help-block"><?php echo $NCM_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MCMTS_err)) ? 'has-error' : ''; ?>">
                            <label>MCMTS</label>
                            <input type="text" name="MCMTS" class="form-control" value="<?php echo $MCMTS; ?>">
                            <span class="help-block"><?php echo $MCMTS_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MCT_err)) ? 'has-error' : ''; ?>">
                            <label>MCT</label>
                            <input type="text" name="MCT" class="form-control" value="<?php echo $MCT; ?>">
                            <span class="help-block"><?php echo $MCT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MPMT_err)) ? 'has-error' : ''; ?>">
                            <label>MPMT</label>
                            <input type="text" name="MPMT" class="form-control" value="<?php echo $MPMT; ?>">
                            <span class="help-block"><?php echo $MPMT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SCST_err)) ? 'has-error' : ''; ?>">
                            <label>SCST</label>
                            <input type="text" name="SCST" class="form-control" value="<?php echo $SCST; ?>">
                            <span class="help-block"><?php echo $SCST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($PST_err)) ? 'has-error' : ''; ?>">
                            <label>PST</label>
                            <input type="text" name="PST" class="form-control" value="<?php echo $PST; ?>">
                            <span class="help-block"><?php echo $PST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MST_err)) ? 'has-error' : ''; ?>">
                            <label>MST</label>
                            <input type="text" name="MST" class="form-control" value="<?php echo $MST; ?>">
                            <span class="help-block"><?php echo $MST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MLR_err)) ? 'has-error' : ''; ?>">
                            <label>MLR</label>
                            <input type="text" name="MLR" class="form-control" value="<?php echo $MLR; ?>">
                            <span class="help-block"><?php echo $MLR_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($DT_err)) ? 'has-error' : ''; ?>">
                            <label>DT</label>
                            <input type="text" name="DT" class="form-control" value="<?php echo $DT; ?>">
                            <span class="help-block"><?php echo $DT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SOEF_err)) ? 'has-error' : ''; ?>">
                            <label>SOEF</label>
                            <input type="text" name="SOEF" class="form-control" value="<?php echo $SOEF; ?>">
                            <span class="help-block"><?php echo $SOEF_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SSA_err)) ? 'has-error' : ''; ?>">
                            <label>SSA</label>
                            <input type="text" name="SSA" class="form-control" value="<?php echo $SSA; ?>">
                            <span class="help-block"><?php echo $SSA_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($DY_err)) ? 'has-error' : ''; ?>">
                            <label>DY</label>
                            <input type="text" name="DY" class="form-control" value="<?php echo $DY; ?>">
                            <span class="help-block"><?php echo $DY_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SS_err)) ? 'has-error' : ''; ?>">
                            <label>SS</label>
                            <input type="text" name="SS" class="form-control" value="<?php echo $SS; ?>">
                            <span class="help-block"><?php echo $SS_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ST_err)) ? 'has-error' : ''; ?>">
                            <label>ST</label>
                            <input type="text" name="ST" class="form-control" value="<?php echo $ST; ?>">
                            <span class="help-block"><?php echo $ST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CRT_err)) ? 'has-error' : ''; ?>">
                            <label>CRT</label>
                            <input type="text" name="CRT" class="form-control" value="<?php echo $CRT; ?>">
                            <span class="help-block"><?php echo $CRT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($NM_err)) ? 'has-error' : ''; ?>">
                            <label>NM</label>
                            <input type="text" name="NM" class="form-control" value="<?php echo $NM; ?>">
                            <span class="help-block"><?php echo $NM_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TNR_err)) ? 'has-error' : ''; ?>">
                            <label>TNR</label>
                            <input type="text" name="TNR" class="form-control" value="<?php echo $TNR; ?>">
                            <span class="help-block"><?php echo $TNR_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TCY_err)) ? 'has-error' : ''; ?>">
                            <label>TCY</label>
                            <input type="text" name="TCY" class="form-control" value="<?php echo $TCY; ?>">
                            <span class="help-block"><?php echo $TCY_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($STF_err)) ? 'has-error' : ''; ?>">
                            <label>STF</label>
                            <input type="text" name="STF" class="form-control" value="<?php echo $STF; ?>">
                            <span class="help-block"><?php echo $STF_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CRF_err)) ? 'has-error' : ''; ?>">
                            <label>CRF</label>
                            <input type="text" name="CRF" class="form-control" value="<?php echo $CRF; ?>">
                            <span class="help-block"><?php echo $CRF_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MMT_err)) ? 'has-error' : ''; ?>">
                            <label>MMT</label>
                            <input type="text" name="MMT" class="form-control" value="<?php echo $MMT; ?>">
                            <span class="help-block"><?php echo $MMT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MNT_err)) ? 'has-error' : ''; ?>">
                            <label>MNT</label>
                            <input type="text" name="MNT" class="form-control" value="<?php echo $MNT; ?>">
                            <span class="help-block"><?php echo $MNT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MUT_err)) ? 'has-error' : ''; ?>">
                            <label>MUT</label>
                            <input type="text" name="MUT" class="form-control" value="<?php echo $MUT; ?>">
                            <span class="help-block"><?php echo $MUT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MS_err)) ? 'has-error' : ''; ?>">
                            <label>MS</label>
                            <input type="text" name="MS" class="form-control" value="<?php echo $MS; ?>">
                            <span class="help-block"><?php echo $MS_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MT_err)) ? 'has-error' : ''; ?>">
                            <label>MT</label>
                            <input type="text" name="MT" class="form-control" value="<?php echo $MT; ?>">
                            <span class="help-block"><?php echo $MT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MRT_err)) ? 'has-error' : ''; ?>">
                            <label>MRT</label>
                            <input type="text" name="MRT" class="form-control" value="<?php echo $MRT; ?>">
                            <span class="help-block"><?php echo $MRT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MLT_err)) ? 'has-error' : ''; ?>">
                            <label>MLT</label>
                            <input type="text" name="MLT" class="form-control" value="<?php echo $MLT; ?>">
                            <span class="help-block"><?php echo $MLT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MCaT_err)) ? 'has-error' : ''; ?>">
                            <label>MCaT</label>
                            <input type="text" name="MCaT" class="form-control" value="<?php echo $MCaT; ?>">
                            <span class="help-block"><?php echo $MCaT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($MDT_err)) ? 'has-error' : ''; ?>">
                            <label>MDT</label>
                            <input type="text" name="MDT" class="form-control" value="<?php echo $MDT; ?>">
                            <span class="help-block"><?php echo $MDT_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($XSST_err)) ? 'has-error' : ''; ?>">
                            <label>XSST</label>
                            <input type="text" name="XSST" class="form-control" value="<?php echo $XSST; ?>">
                            <span class="help-block"><?php echo $XSST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($XST_err)) ? 'has-error' : ''; ?>">
                            <label>XST</label>
                            <input type="text" name="XST" class="form-control" value="<?php echo $XST; ?>">
                            <span class="help-block"><?php echo $XST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TST_err)) ? 'has-error' : ''; ?>">
                            <label>TST</label>
                            <input type="text" name="TST" class="form-control" value="<?php echo $TST; ?>">
                            <span class="help-block"><?php echo $TST_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TDT_err)) ? 'has-error' : ''; ?>">
                            <label>TDT</label>
                            <input type="text" name="TDT" class="form-control" value="<?php echo $TDT; ?>">
                            <span class="help-block"><?php echo $TDT_err;?></span>
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