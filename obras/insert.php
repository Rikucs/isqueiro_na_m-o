<?php  
include("../user/config.php");;
 $sql = "INSERT INTO obras(nome, mostrar) VALUES('".$_POST["nome"]."', '".$_POST["mostrar"]."')";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 