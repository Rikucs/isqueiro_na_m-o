<?php  
include("../user/config.php");

$id_abastecimentos = $_POST["id_abastecimentos"];  

$sql = "UPDATE abastecimentos SET reciclagem = '0' WHERE id_abastecimentos = '".$id_abastecimentos."'";

if(mysqli_query($link, $sql))  

 {  
      echo 'Data recovered';
 
 }  
 ?>  
