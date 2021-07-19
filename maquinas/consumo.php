<?php 
include("../pages/estrutura.php"); 
include("../user/config.php"); 
?>
<?php


// Guardar Cenas da tabela maquinas -------------------------------------------------------------------------


$maquina = $_GET["maquina"];
$sql = "SELECT * FROM maquinas 
     INNER JOIN  combustiveis ON maquinas.combustivel = combustiveis.id_combustiveis
     where id_maquinas = '".$_GET["maquina"]."'
     ORDER BY id_maquinas DESC";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_array($result)){ 

        $id = $row["id_maquinas"];
        $Nome = $row["Nome"];
        $matricula = $row["matricula"];
        $NOME = $row["NOME"];  
        $ano = $row["ano"];
        $km =  $row["km"];
        $h = $row["h"];
        $km_iniciais =$row["km_iniciais"]; 
        $h_iniciais = $row["h_iniciais"];
        $obrservacoes = $row["observacoes"];        
        
    }

}else{

    echo "Oops! Something went wrong. Please try again later.";
}

$sql = "SELECT SUM(horas) AS horas FROM abastecimentos where maquina = '".$_GET["maquina"]."' ";
$result = mysqli_query($link, $sql);
$row_contar = mysqli_fetch_assoc($result); 
$contagemH = $row_contar['horas'];


$sql = "SELECT SUM(litros) AS litros FROM abastecimentos where maquina = '".$_GET["maquina"]."' ";
$result = mysqli_query($link, $sql);
$row_contar = mysqli_fetch_assoc($result); 
$contagemL = $row_contar['litros'];

//Media Registros ----------------------------------------------------------------------------------------

$media = $contagemL / $contagemH ;

//Menor Registro ----------------------------------------------------------------------------------------


$sql= "SELECT MIN(litros) AS menorregistro FROM abastecimentos where maquina = '".$maquina."'";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_array($result)){ 
        $mlitros = $row["menorregistro"];
        
    }

}else{

    echo "Oops! Something went wrong. Please try again later.";
}


// Maior Registro ------------------------------------------------------------------------------------------


$sql= "SELECT Max(litros) AS maiorregistro FROM abastecimentos where maquina = '".$maquina."'";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_array($result)){ 
        $Mlitros = $row["maiorregistro"];
        
    }

}else{

    echo "Oops! Something went wrong. Please try again later.";
}

?>






 <!-- Content Body Start -->
 <div class="content-body">

<div class="row mbn-30">

    <!--Invoice Head Start-->
    <div class="col-12 mb-30">
        <div class="invoice-head">
            <h2 class="fw-700 mb-15"><?php Echo $Nome; ?></h2>
            <hr>
            <div class="d-flex justify-content-between row mbn-20">
                <!--Invoice Form-->
                <div class="text-left col-12 col-sm-auto mb-20">
                    <h4 class="fw-600">Matricula</h4>
                    <p>
                       Maior abastecimento      <br>
                       Menor abastecimento      <br>
                       Media de bastecimentos
                    </p>
                </div>
                <!--Invoice To-->
                <div class="text-left text-sm-right col-12 col-sm-auto mb-20">
                    <h4 class="fw-600"><?php Echo $matricula; ?></h4>
                    <p>
                        <?php Echo $Mlitros; ?>  L  <br>
                        <?php Echo $mlitros; ?>  L  <br>
                        <?php Echo $media; ?> km/H  <br>
               </p>
                    
                </div>
            </div>
        </div>
    </div>
    <!--Invoice Head End-->

    <!--Invoice Details Table Start-->
    <div class="col-12 mb-30">
        <div class="table-responsive">
  <?php          
 
 $sql = "SELECT * FROM abastecimentos 
 INNER JOIN obras ON abastecimentos.obra = obras.id_obras
 INNER JOIN  maquinas ON abastecimentos.maquina = maquinas.id_maquinas
 INNER JOIN  combustiveis ON abastecimentos.combustivel = combustiveis.id_combustiveis
 where abastecimentos.maquina = '".$maquina."'
 ORDER BY id_abastecimentos DESC";  
 $result = mysqli_query($link, $sql);
 
 ?>
      <table class="table table-bordered mb-0">
                <thead>

                    <tr>
                        
                        <th class="text-center"><span>Nome</span></th>
                        <th class="text-center"><span>Litros</span></th>
                        <th class="text-center"><span>Horas</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                        while($row = mysqli_fetch_array($result)){
                        
                    ?>
                    <tr>
                        <td align="center" ><?php echo $row["Nome"]?></td>
                        <td align="center" ><?php echo $row["litros"]?></td>
                        <td align="center"><?php echo $row["horas"]?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--Invoice Details Table End-->

    <!--Invoice Total Start-->
    <div class="col-12 d-flex justify-content-end mb-15">
        <div class="text-right">
            <h6>Total Litros: <?php echo $contagemL ?> </h6>
            <h6>Total Horas: <?php echo $contagemH ?> </h6>
            <hr class="mb-10">
            <h3 class="fw-600 mb-0">Media Total: <?php echo $media ?></h3>
        </div>
    </div>
    <!--Invoice Total Start-->

    <div class="col-12 mb-15">
        <hr>
    </div>

    <!--Invoice Action Button Start-->
    <div class="col-12 d-flex justify-content-end mb-30">
        <div class="buttons-group">
            <button class="button button-outline button-primary">Download PDF</button>
        </div>
    </div>
    <!--Invoice Action Button Start-->

</div>

</div><!-- Content Body End -->









              


              
              

                   
        
	    <!--html Global Vendor, plugins & Activation JS -->
    <script src="../assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
    <!--Plugins JS-->
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/tippy4.min.js.js"></script>
    <!--Main JS-->
    <script src="../assets/js/main.js"></script>
 
    

	
	

    <!-- JS
============================================ -->

</body>
</html>