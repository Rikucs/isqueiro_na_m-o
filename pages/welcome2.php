<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

$query = "SELECT id_maquinas, Nome FROM maquinas";
$result = mysqli_query($link, $query);
$opcoes = "";	 

while($row = mysqli_fetch_array($result))
{
   $opcoes = $opcoes."<option>$row[0] - $row[1]";
}
$query = "SELECT id_obras, nome FROM obras";
$result = mysqli_query($link, $query);
$opcoes1 = "";	 

while($row = mysqli_fetch_array($result))
{
   $opcoes1 = $opcoes1."<option>$row[0] - $row[1]";
}

$query = "SELECT id_combustiveis, NOME FROM combustiveis";
$result = mysqli_query($link, $query);
$opcoes2 = "";	 

while($row = mysqli_fetch_array($result))
{
   $opcoes2 = $opcoes2."<option>$row[0] - $row[1]";
}
 
 
// Define variables and initialize with empty values

$adata = $maquina = $obra = $combustivel = $litros = $km = $horas = $assinatura = "";

$adata_err = $maquina_err = $obra_err = $combustivel_err = $litros_err = $km_err = $horas_err = $assinatura_err = "";
 
 


if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    if(empty(trim($_POST["adata"])) || empty(trim($_POST["maquina"])) || empty(trim($_POST["obra"])) || empty(trim($_POST["combustivel"])) || empty(trim($_POST["litros"])) || empty(trim($_POST["km"])) || empty(trim($_POST["horas"]))){
     
        $adata_err = "Coloque a data";
        $maquina_err = "Coloque a maquina.";
        $obra_err = "Coloque a obra";
        $combustivel_err = "Coloque o combustivel";
        $litros_err = "Coloque os litros"; 
        $km_err = "Coloque os kms";
        $horas_err = "Coloque as horas";
            
   
    } else{       
       
        
        $adata = trim($_POST["adata"]);
        $maquina = trim($_POST["maquina"]);
        $obra = trim($_POST["obra"]);
        $combustivel = trim($_POST["combustivel"]);
        $litros = trim($_POST["litros"]);
        $km = trim($_POST["km"]);
        $horas = trim($_POST["horas"]);
        
   
    }  
    
    if(empty($adata_err) && empty($maquina_err) && empty($obra_err) && empty($combustivel_err) && empty($litros_err) && empty($km_err) && empty($horas_err) && empty($assinatura_err)){
        
        // Prepare an insert statement
       
        $sql = "INSERT INTO abastecimentos ( adata, maquina, obra, combustivel, litros, km, horas, assinatura) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
           
            // Bind variables to the prepared statement as parameters
           
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_adata, $param_maquina, $param_obra, $param_combustivel, $param_litros, $param_km, $param_horas, $param_assinatura);
                     
            // Set parameters
            
           

            $param_adata = $adata;
           
            $param_maquina = $maquina;
            
            $param_obra = $obra;
            
            $param_combustivel = $combustivel;
            
            $param_litros = $litros;
            
            $param_km = $km;
            
            $param_horas = $horas;
            
            $param_assinatura = htmlspecialchars($_SESSION["username"]);

            
         
            if(mysqli_stmt_execute($stmt)){
          
                // Redirect to login page
                echo "<script> alert('inserido com sucesso')</scritp>";
                echo $horas;
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
                                    <select  class="form-control select2" name="maquina" required>
                                        <option hidden></option>
                                        <?php echo $opcoes; ?>
                                    </select>
                                    <span class="help-block"><?php echo $maquina_err; ?></span>
            
                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($obra_err)) ? 'has-error' : ''; ?>">

                                    <label>Obra</label>

                                    <select class="form-control select2" name="obra" required>
                                        <option hidden></option>
                                            <?PHP ECHO $opcoes1; ?>
                                    </select></td>
                                    <span class="help-block"><?php echo $obra_err; ?></span>

                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($combustivel_err)) ? 'has-error' : ''; ?>">

                                    <label>Combustivel</label>

                                    <select class="form-control select2" name="combustivel" required>
                                        <option hidden></option>
                                        <?php echo $opcoes2; ?>
                                    </select>
                                    <span class="help-block"><?php echo $combustivel_err; ?></span>

                                </div>

                                <br/>

                                <div class="form-group <?php echo (!empty($litros_err)) ? 'has-error' : ''; ?>">

                                    <label>Litros</label>

                                    <input type="text" name="litros" class="form-control" value="<?php echo $litros; ?>" placeholder="Coloque os litros">

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

                                    <input type="text" name="horas" class="form-control" value="<?php echo $horas; ?>" placeholder="Em quantas horas">

                                    <span class="help-block"><?php echo $horas_err; ?></span>

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