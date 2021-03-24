<?php  
include("../user/config.php");

$id_combustiveis = $_POST["id_combustiveis"];  

$sql = "UPDATE combustiveis SET reciclagem = '0' WHERE id_combustiveis = '".$id_combustiveis."'";

if(mysqli_query($link, $sql))  

 {  
      echo 'Data recovered';
 
 }  
 ?>  
