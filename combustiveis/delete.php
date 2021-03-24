<?php  
include("../user/config.php");

if(isset($_GET["reciclagem"]) == '1'){

     $sql = "DELETE FROM combustiveis WHERE id_combustiveis = '".$_POST["id_combustiveis"]."'";  

}else{

     $sql = "UPDATE combustiveis SET reciclagem = '1' WHERE id_combustiveis = '".$_POST["id_combustiveis"]."'";
}     
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>