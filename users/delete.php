<?php  
include("../user/config.php");

if(isset($_GET["reciclagem"]) == '1'){
      $sql = "DELETE FROM users WHERE id_user = '".$_POST["id_user"]."'"; 
}else{
     $sql = "UPDATE users SET reciclagem = '1' WHERE id_user = '".$_POST["id_user"]."'";
} 
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>