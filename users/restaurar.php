<?php  
include("../user/config.php");

$id_user = $_POST["id_user"];  

$sql = "UPDATE users SET reciclagem = '0' WHERE id_user = '".$id_user."'";

if(mysqli_query($link, $sql))  

 {  
      echo 'Data recovered';
 
 }  
 ?>  
