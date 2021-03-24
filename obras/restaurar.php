<?php  
include("../user/config.php");

$id_obras = $_POST["id_obras"];  

$sql = "UPDATE obras SET reciclagem = '0' WHERE id_obras = '".$id_obras."'";

if(mysqli_query($link, $sql))  

 {  
      echo 'Data recovered';
 
 }  
 ?>  
