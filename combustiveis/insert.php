<?php  
include("../user/config.php");;
 $sql = "INSERT INTO combustiveis(NOME, preco) VALUES('".$_POST["NOME"]."', '".$_POST["preco"]."')";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 