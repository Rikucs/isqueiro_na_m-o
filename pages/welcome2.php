<?php

// Initialize the session

session_start();
 
// Check if the user is logged in, if not then redirect him to login page

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    
    header("location: ../index.php");
   
    exit;

}


?>

<?php

// Include config file

require_once "../user/config.php";
 
// Define variables and initialize with empty values

$user = $adata = $maquina = $obra = $combustivel = $litros = $km = $horas = $assinatura = "";

$adata_err = $maquina_err = $obra_err = $combustivel_err = $litros_err = $km_err = $horas_err = $assinatura_err = "";
 
 


if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    if(empty(trim($_POST["adata"])) || empty(trim($_POST["maquina"])) || empty(trim($_POST["obra"])) || empty(trim($_POST["combustivel"])) || empty(trim($_POST["litros"])) || empty(trim($_POST["km"])) || empty(trim($_POST["horas"])) || empty(trim($_POST["assinatura"]))){
     
        $adata_err = "Coloque a data";
        $maquina_err = "Coloque a maquina.";
        $obra_err = "Coloque a obra";
        $combustivel_err = "Coloque o combustivel";
        $litros_err = "Coloque os litros"; 
        $km_err = "Coloque os kms";
        $horas_err = "Coloque as horas";
        $assinatura_err = "Coloque a assinatura";      
   
    } else{       
       
        $user = $_SESSION["username"];
        $adata = trim($_POST["adata"]);
        $maquina = trim($_POST["maquina"]);
        $obra = trim($_POST["obra"]);
        $combustivel = trim($_POST["combustivel"]);
        $litros = trim($_POST["litros"]);
        $km = trim($_POST["km"]);
        $horas = trim($_POST["horas"]);
        $assinatura = trim($_POST["assinatura"]);
   
    }  
    
    if(empty($adata_err) && empty($maquina_err) && empty($obra_err) && empty($combustivel_err) && empty($litros_err) && empty($km_err) && empty($horas_err) && empty($assinatura_err)){
        
        // Prepare an insert statement
       
        $sql = "INSERT INTO abastecimentos (user, adata, maquina, obra, combustivel, litros, km, horas, assinatura, aceite) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
           
            // Bind variables to the prepared statement as parameters
           
            mysqli_stmt_bind_param($stmt, "ssssssssss",$param_user, $param_adata, $param_maquina, $param_obra, $param_combustivel, $param_litros, $param_km, $param_horas, $param_assinatura, $param_aceite);
                     
            // Set parameters
            
            $param_user = $user;

            $param_adata = $adata;
           
            $param_maquina = $maquina;
            
            $param_obra = $obra;
            
            $param_combustivel = $combustivel;
            
            $param_litros = $litros;
            
            $param_km = $km;
            
            $param_horas = $horas;
            
            $param_assinatura = $assinatura;

            $param_aceite = 0;
         
            if(mysqli_stmt_execute($stmt)){
          
                // Redirect to login page
          
                header("location: ../index.php");
          
            } else{
           
                echo "Something went wrong. Please try again later.";
           
            }

            // Close statement 

            
            mysqli_stmt_close($stmt);
        
        }
    
    }
    
    // Close connection
  
    mysqli_close($link);
    header("location: ../user/logout.php");
    exit;
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
        
                                <h2>Bem Vindo</h2>
        
                                <p>Preencha todos os campos</p>
                            
                            </div> 
    
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          
                                <div class="form-group <?php echo (!empty($adata_err)) ? 'has-error' : ''; ?>">
              
                                    <label>Data</label>
              
                                    <input type="text" name="adata" class="form-control" value="<?php echo $adata; ?>" placeholder= " ano/mes/dia">
            
                                    <span class="help-block"><?php echo $adata_err; ?></span>
          
                                </div>

                                <br/>    
           
                                <div class="form-group <?php echo (!empty($maquina_err)) ? 'has-error' : ''; ?>">
           
                                    <label>maquina</label>
            
                                    <input type="maquina" name="maquina" class="form-control" value="<?php echo $maquina; ?>" placeholder= "escolha a maquina">
             
                                    <span class="help-block"><?php echo $maquina_err; ?></span>
            
                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($obra_err)) ? 'has-error' : ''; ?>">

                                    <label>Obra</label>

                                    <input type="text" name="obra" class="form-control" value="<?php echo $obra; ?>" placeholder="Escolha a obra">

                                    <span class="help-block"><?php echo $obra_err; ?></span>

                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($combustivel_err)) ? 'has-error' : ''; ?>">

                                    <label>Combustivel</label>

                                    <input type="text" name="combustivel" class="form-control" value="<?php echo $combustivel; ?>" placeholder="use the combustivel thing">

                                    <span class="help-block"><?php echo $combustivel_err; ?></span>

                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($litros_err)) ? 'has-error' : ''; ?>">

                                    <label>Litros</label>

                                    <input type="text" name="litros" class="form-control" value="<?php echo $litros; ?>" placeholder="use the litros thing">

                                    <span class="help-block"><?php echo $litros_err; ?></span>

                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($km_err)) ? 'has-error' : ''; ?>">

                                    <label>Kilometros</label>

                                    <input type="text" name="km" class="form-control" value="<?php echo $km; ?>" placeholder="Quantos kilometros percorreu">

                                    <span class="help-block"><?php echo $km_err; ?></span>

                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($horas_err)) ? 'has-error' : ''; ?>">

                                    <label>Horas</label>

                                    <input type="text" name="horas" class="form-control" value="<?php echo $horas; ?>" placeholder="Em quanto tempo">

                                    <span class="help-block"><?php echo $horas_err; ?></span>

                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($assinatura_err)) ? 'has-error' : ''; ?>">

                                    <label>Assinatura</label>

                                    <input type="text" name="assinatura" class="form-control" value="<?php echo $assinatura; ?>" placeholder="Assine aqui">

                                    <span class="help-block"><?php echo $assinatura_err; ?></span>

                                </div>

                                <br/>


                                

                                <div class="form-group">

                                    <input type="submit" class="button button-primary button-outline" value="Submit" 

                                    <input type="reset" class="button button-primary button-outline" value="Reset">

                                </div>

                            </form>

                        </div>
                    
                    </div>

                    <div>
                    
                        <div class="content">
                    
                            <img src="../img/imglogin.png" alt="Fucking Cat"  >

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