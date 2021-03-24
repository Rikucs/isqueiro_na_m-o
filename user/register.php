<?php

// Initialize the session

session_start();
 
// Check if the user is logged in, if not then redirect him to login page

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    
    header("location: ../index.php");
   
    exit;

}

if(!isset($_SESSION["adm"])){
	
	echo  "<script>alert('Não tem permissao');</script>";
	
    header('location: ../pages/welcome2.php?erro=1');	

}

?>

<?php

// Include config file

require_once "config.php";
 
// Define variables and initialize with empty values

$username = $password = $confirm_password = $adm = $nfc = "";

$username_err = $password_err = $confirm_password_err = $adm_err = $nfc_err = "";
 
 
// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    
    if(empty(trim($_POST["username"]))){
     
        $username_err = "Please enter a username.";
   
    } else{
        
        // Prepare a select statement
        
        $sql = "SELECT id_user FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Bind variables to the prepared statement as parameters
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            
            if(mysqli_stmt_execute($stmt)){
                
                /* store result */
               
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                 
                    $username_err = "This username is already taken.";
               
                } else{
                  
                    $username = trim($_POST["username"]);
                
                }
            } else{
         
                echo "Oops! Something went wrong. Please try again later.";
        
            }
       
            // Close statement
      
            mysqli_stmt_close($stmt);
      
        }
   
    }
    
    // Validate password
    
    if(empty(trim($_POST["password"]))){
    
        $password_err = "Please enter a password.";     
   
    } elseif(strlen(trim($_POST["password"])) < 6){
    
        $password_err = "Password must have atleast 6 characters.";
    
    } else{
    
        $password = trim($_POST["password"]);
   
    }
    
    // Validate confirm password
    
    if(empty(trim($_POST["confirm_password"]))){
    
        $confirm_password_err = "Please confirm password.";     
    
    } else{
   
        $confirm_password = trim($_POST["confirm_password"]);
    
        if(empty($password_err) && ($password != $confirm_password)){
    
            $confirm_password_err = "Password did not match.";
    
        }
   
    }

    // Validate ADM    
    
    if(trim($_POST["adm"]) >1){
    
        $adm_err = "Adm can only be 0 or 1.";
    
    } else{
    
        $adm = trim($_POST["adm"]);
   
    }

 if(empty(trim($_POST["nfc"]))){
     
        $username_err = "Please enter a nfc.";
   
    } else{
        
        // Prepare a select statement
        
        $sql = "SELECT id_user FROM users WHERE nfc = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Bind variables to the prepared statement as parameters
            
            mysqli_stmt_bind_param($stmt, "s", $param_nfc);
            
            // Set parameters
            
            $param_nfc = trim($_POST["nfc"]);
            
            // Attempt to execute the prepared statement
            
            if(mysqli_stmt_execute($stmt)){
                
                /* store result */
               
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                 
                    $nfc_err = "This NFC is already taken.";
               
                } else{
                  
                    $nfc = trim($_POST["nfc"]);
                
                }
            } else{
         
                echo "Oops! Something went wrong. Please try again later.";
        
            }
       
            // Close statement
      
            mysqli_stmt_close($stmt);
      
        }
   
    }
    
   
   
    

    // Check input errors before inserting in database
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($nfc_err)){
        
        // Prepare an insert statement
       
        $sql = "INSERT INTO users (username, password, adm, nfc) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
           
            // Bind variables to the prepared statement as parameters
           
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_adm, $param_nfc);
                     
            // Set parameters
          
            $param_username = $username;
           
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
          
            $param_adm = $adm;

            $param_nfc = $nfc;

            // Attempt to execute the prepared statement
         
            if(mysqli_stmt_execute($stmt)){
          
                // Redirect to login page
          
                header("location: index.php");
          
            } else{
           
                echo "Something went wrong. Please try again later.";
           
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

<html lang="en">

<head>

<meta charset="utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Controlo de Combustiveis</title>
    
    <meta name="robots" content="noindex, follow" />
    
    <meta name="description" content="">
   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Favicon -->
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

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

        <!-- Content Body Start -->
       
        <div class="content-body m-0 p-0">

            <div class="login-register-wrap">
                
                <div class="row">

                    <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">
                       
                        <div class="login-register-form-wrap">

                            <div class="content">
        
                                <h2>Sign Up</h2>
        
                                <p>Please fill this form to create an account.</p>
                            
                            </div> 
    
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          
                                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
              
                                    <label>Username</label>
              
                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder= "put ur username">
            
                                    <span class="help-block"><?php echo $username_err; ?></span>
          
                                </div>

                                <br/>    
           
                                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
           
                                    <label>Password</label>
            
                                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder= "put ur password">
             
                                    <span class="help-block"><?php echo $password_err; ?></span>
            
                                </div>

                                <br/>
            
                                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

                                    <label>Confirm Password</label>

                                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder= "confirm ur password">

                                    <span class="help-block"><?php echo $confirm_password_err; ?></span>

                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($adm_err)) ? 'has-error' : ''; ?>">

                                    <label>adm</label>

                                    <input type="text" name="adm" class="form-control" value="<?php echo $adm; ?>" placeholder="put o for normal user 1 to adms">

                                    <span class="help-block"><?php echo $adm_err; ?></span>

                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($nfc_err)) ? 'has-error' : ''; ?>">

                                    <label>NFC</label>

                                    <input type="text" name="nfc" class="form-control" value="<?php echo $nfc; ?>" placeholder="use the nfc thing">

                                    <span class="help-block"><?php echo $nfc_err; ?></span>

                                </div>

                                <br/>

                                <div class="form-group">

                                    <input type="submit" class="button button-primary button-outline" value="Submit">

                                    <input type="reset" class="button button-primary button-outline" value="Reset">

                                </div>

                            </form>

                        </div>
                    
                    </div>

                    <div>
                    
                        <div class="content">
                    
                            <img src="../img/imglogin.png" alt="Fucking Cat" align="right" >

                        </div>
                
                    </div>

                </div>    

            </div>          
        
        </div>
        
    </div>
            
        <!-- JS

============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->

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