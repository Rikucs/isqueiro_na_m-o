<?php  
include("../user/config.php");;
 $sql = "INSERT INTO obras(nome, Horas) VALUES('".$_POST["nome"]."', '".$_POST["Horas"]."')";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 