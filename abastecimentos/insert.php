<?php  
include("../user/config.php");

 $sql = "INSERT INTO abastecimentos(maquina, obra, combustivel, litros, km, horas, assinatura) VALUES('".$_POST["maquina"]."', '".$_POST["obra"]."', '".$_POST["combustivel"]."', '".$_POST["litros"]."', '".$_POST["km"]."', '".$_POST["horas"]."', '".$_POST["assinatura"]."')"; 

 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 
