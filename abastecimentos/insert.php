<?php  
include("../user/config.php");

     $maquina = $_POST["maquina"] ;
     $obra = $_POST["obra"];
     $combustivel = $_POST["combustivel"];
     $maquinas = (int) $maquina ;
     $obras = (int) $obra ;
     $combustivels = (int) $combustivel ;

 $sql = "INSERT INTO abastecimentos(adata, maquina, obra, combustivel, litros, km, horas, assinatura) VALUES('".$_POST["adata"]."','".$maquinas."', '".$obras."', '".$combustivels."', '".$_POST["litros"]."', '".$_POST["km"]."', '".$_POST["horas"]."', '".$_POST["assinatura"]."')"; 

 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Inserted';  
 } 
 
 echo $maquinas;
 echo $obras;
 echo $combustivels;
 ?> 
