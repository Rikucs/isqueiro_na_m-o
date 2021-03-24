<?php  
include("../user/config.php");

$id_maquinas = $_POST["id_maquinas"];  

$sql = "UPDATE maquinas SET reciclagem = '0' WHERE id_maquinas = '".$id_maquinas."'";

if(mysqli_query($link, $sql))  

 {  
      echo 'Data recovered';
 
 }  
 ?>  
