<?php

// Initialize the session

session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
   
    if(!isset($_SESSION["adm"])){
	
        header('location:  pages/welcome2.php');
        
        exit;
    
    }else{
    
        header("location: pages/welcome.php");
 
        exit;
    }
}
 

// Include config file

require_once "user/config.php";
 

// Define variables and initialize with empty values

$nfc = $username = $adm="";

$nfc_err = $username_err = $adm_err = "";

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty

    if(empty(trim($_POST["nfc"]))){

        $nfc_err = "Please use the nfc.";

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
                 
                    $nfc = trim($_POST["nfc"]);               
                } else{
                  
                    $nfc_err = "This nfc don´t exist.";
                
                }
            } else{
         
                echo "Oops! Something went wrong. Please try again later.";
        
            }

	}	
        if(empty($nfc_err)){

        // Prepare a select statement

        $sql = "SELECT id_user, username, adm, nfc FROM users WHERE nfc = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "s", $param_nfc);
            
            // Set parameters

            $param_nfc = $nfc;
            
            // Attempt to execute the prepared statement

            if(mysqli_stmt_execute($stmt)){

                // Store result

                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password

                if(mysqli_stmt_num_rows($stmt) == 1){                    

                    // Bind result variables

                    mysqli_stmt_bind_result($stmt, $id, $username, $adm, $nfc);

                    if(mysqli_stmt_fetch($stmt)){

                        

                        if($adm == 1){

                        	// Admin	

                        	session_start();
                        	    
                       		 // Store data in session variables

                            $_SESSION["loggedin"] = true;

                            $_SESSION["id"] = $id;

                            $_SESSION["username"] = $username;

                            $_SESSION["adm"] = $adm;                         
                            
                            // Redirect adm to welcome page

                            header("location: pages/welcome.php");

                        } else{

							// Regular user 
                           	
                            session_start();
                            
                            // Store data in session variables

                            $_SESSION["loggedin"] = true;

                            $_SESSION["id"] = $id;

                            $_SESSION["username"] = $username;
                            	                            	
                            // Redirect user to welcome page
                        	header("location: pages/welcome2.php");
                        	
                        }

                    }
				}
			}	
		}	
 	}
 	

                       
                

            

            

// Close statement
            
mysqli_stmt_close($stmt);
        
        
    

    
// Close connection
    
mysqli_close($link);

}
}


?>
 
<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Controlo de Consumo de Combustiveis</title>

    <meta name="robots" content="noindex, follow" />

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->

    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS

    ============================================ -->

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->

    <link rel="stylesheet" href="assets/css/vendor/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/vendor/themify-icons.css">

    <link rel="stylesheet" href="assets/css/vendor/cryptocurrency-icons.css">

    <!-- Plugins CSS -->

    <link rel="stylesheet" href="assets/css/plugins/plugins.css">

    <!-- Helper CSS -->

    <link rel="stylesheet" href="assets/css/helper.css">

    <!-- Main Style CSS -->

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="skin-dark">   

    <div class="main-wrapper">
        
        <div class="content-body m-0 p-0">

            <div class="login-register-wrap">

                <div class="row">

                    <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">

                        <div class="login-register-form-wrap">    
                            <div class="content">
                                <h2>Login</h2>
        
                                <p>Please use   your NFC to login.</p>

                            </div>
        
                            <div class="login-register-form">
        
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                
                                    <div class="row">

                                        <div class="col-12 mb-20">
        
                                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        
                                                <label>NFC</label>
        
                                                <input type="text" name="nfc" class="form-control" value="<?php echo $nfc; ?>" placeholder="nfc" >
        
                                                <span class="help-block"><?php echo $nfc_err; ?></span>
        
                                            </div>
        
                                            <br/>

                                        </div>

                                    </div>       
        
                                    <div class="form-group">
        
                                        <input type="submit" class="button button-primary button-outline" value="Login">
                                        <button class="button button-primary button-outline"><a href="user/login.php">Não tem NFC</a> </button>
        
                                    </div>
        
        
                                </form>
    
                            </div>
                        </div>
                   
                    </div> 
    
                    <div>
        
                        <div class="content">
    
                        <img src="img/imglogin.png" alt="Fucking Cat" align="right">
        
                        </div>
        
                    </div>
    
                </div>
                   
            </div>
                
        </div>
            
    </div>
        
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    
    <script src="assets/js/vendor/popper.min.js"></script>
    
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    
    <!--Plugins JS-->
    
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    
    <script src="assets/js/plugins/tippy4.min.js.js"></script>
    
    <!--Main JS-->
    
    <script src="assets/js/main.js"></script>


</body>

</html>