<?php  
include("../user/config.php");;
 $sql = "INSERT INTO maquinas(Nome, matricula, combustivel, ano, km, h, km_iniciais, h_iniciais, observacoes) VALUES('".$_POST["Nome"]."', '".$_POST["matricula"]."', '".$_POST["combustivel"]."', '".$_POST["ano"]."', '".$_POST["km"]."', '".$_POST["h"]."', '".$_POST["km_iniciais"]."', '".$_POST["h_iniciais"]."', '".$_POST["observacoes"]."')";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 