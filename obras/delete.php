<?php  
include("../user/config.php");

if(isset($_GET["reciclagem"]) == '1'){

     $sql = "DELETE FROM obras WHERE id_obras = '".$_POST["id_obras"]."'";  
 
}else{

     $sql = "UPDATE obras SET reciclagem = '1' WHERE id_obras = '".$_POST["id_obras"]."'";
} 
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>