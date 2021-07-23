<?php 
include("../pages/estrutura.php"); 
include("../user/config.php"); 
?>
<?php


// Guardar Cenas da tabela maquinas -------------------------------------------------------------------------


$obras = $_GET["obras"];
$sql = "SELECT * FROM obras 
     where id_obras = '".$_GET["obras"]."'
     ORDER BY id_obras DESC";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_array($result)){ 

        $id = $row["id_obras"];
        $nome = $row["nome"]; 
        $Horas = $row["Horas"];        
        
    }

}else{

    echo "Oops! Something went wrong. Please try again later.";
}

$sql = "SELECT * FROM abastecimentos 
INNER JOIN obras ON abastecimentos.obra = obras.id_obras
INNER JOIN  maquinas ON abastecimentos.maquina = maquinas.id_maquinas
INNER JOIN  combustiveis ON abastecimentos.combustivel = combustiveis.id_combustiveis
where abastecimentos.reciclagem = 0 AND obra = ".$obras."
ORDER BY id_abastecimentos DESC";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_array($result)){ 

        $id_abastecimento = $row["id_obras"];
        $data = $row["adata"]; 
        $maquina = $row["Nome"];
        $obra = $row["nome"];
        $combustivel = $row["NOME"]; 
        $litros = $row["litros"];
        $km = $row["km"];
        $horas = $row["horas"];         
        
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
            <h2 class="fw-700 mb-15"><?php Echo $obra; ?></h2>
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
                    <h4 class="fw-600"></h4>
                    <p>
                          L  <br>
                          L  <br>
                         km/H  <br>
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
 where abastecimentos.reciclagem = 0 AND obra = ".$obras."
 ORDER BY id_abastecimentos DESC"; 
 $result = mysqli_query($link, $sql);
 
 ?>
      <table class="table table-bordered mb-0">
                <thead>

                    <tr>
                        
                        <th class="text-center"><span>Data</span></th>
                        <th class="text-center"><span>Maquina</span></th>
                        <th class="text-center"><span>Obra</span></th>
                        <th class="text-center"><span>Combustivel</span></th>
                        <th class="text-center"><span>Litros</span></th>
                        <th class="text-center"><span>Horas</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                        while($row = mysqli_fetch_array($result)){
                        
                    ?>
                    <tr>
                        <td align="center" ><?php echo $row["adata"]?></td>
                        <td align="center" ><?php echo $row["Nome"]?></td>
                        <td align="center"><?php echo $row["nome"]?></td>
                        <td align="center"><?php echo $row["NOME"]?></td>
                        <td align="center"><?php echo $row["litros"]?></td>
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
            <h6>Total Litros:  </h6>
            <h6>Total Horas:  </h6>
            <hr class="mb-10">
            <h3 class="fw-600 mb-0">Media Total: </h3>
        </div>
    </div>
    <!--Invoice Total Start-->

    <div class="col-12 mb-15">
        <hr>
    </div>

    <!--Invoice Action Button Start-->
    <div class="col-12 d-flex justify-content-end mb-30">
        <div class="buttons-group">
            <a  class="button button-outline button-primary" href = "consumopdf.php?maquina=<?php echo $maquina ?>">Ver em PDF</a>
            <a class="button button-outline button-secondary" href = "maquinas.php">Voltar</a>
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