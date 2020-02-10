<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$name = $brand = $cutter_speed = "";
$name_err = $brand_err = $cutter_speed_err = "";
 
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
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($brand_err) && empty($cutter_speed_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO jobs (name, brand, cutter_speed) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_brand, $param_cutter_speed);
            
            // Set parameters
            $param_name = $name;
            $param_brand = $brand;
            $param_cutter_speed = $cutter_speed;
            
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>