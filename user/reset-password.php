<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id_user = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: ../index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 

<!DOCTYPE html>

<html lang="pt">

<head>

<meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Controlo de Consumo de Combustiveis</title>

    <meta name="robots" content="noindex, follow" />

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->

    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico">

    <!-- CSS

    ============================================ -->

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="../assets/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->

    <link rel="stylesheet" href="../assets/css/vendor/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="../assets/css/vendor/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/css/vendor/themify-icons.css">

    <link rel="stylesheet" href="../assets/css/vendor/cryptocurrency-icons.css">

    <!-- Plugins CSS -->

    <link rel="stylesheet" href="../assets/css/plugins/plugins.css">

    <!-- Helper CSS -->

    <link rel="stylesheet" href="../assets/css/helper.css">

    <!-- Main Style CSS -->

    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="skin-dark">   

    <div class="main-wrapper">
        
        <div class="content-body m-0 p-0">
        <div class="login-register-wrap">

    <div class="row">

    <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">

        <div class="login-register-form-wrap">    
            <div class="content">
        <h2>Mudar Password</h2>
        <p>Preencha os campos para mudar a password.</p>

        </div>
        
                            <div class="login-register-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                                    
        <div class="row">

<div class="col-12 mb-20">

            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="welcome.php">Cancel</a>
            </div>
        </form>
    </div>   
    </div>
                   
                    </div> 
    
                    <div>
        
                    </div>
    
                </div>
                   
            </div>
                
        </div>
            
    </div>
        
    <script src="../assets/js/vendor/modernizr-3.6.0.min.js"></script>
    
    <script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>
    
    <script src="../assets/js/vendor/popper.min.js"></script>
    
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
    
    <!--Plugins JS-->
    
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    
    <script src="../assets/js/plugins/tippy4.min.js.js"></script>
    
    <!--Main JS-->
    
    <script src="../assets/js/main.js"></script>


</body>

</html> 
</body>
</html>