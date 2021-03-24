<?php  
include("../user/config.php");
if(isset($_GET["reciclagem"]) == '1'){

     $sql = "DELETE FROM maquinas WHERE id_maquinas = '".$_POST["id_maquinas"]."'"; 
     
}else{

     $sql = "UPDATE maquinas SET reciclagem = '1' WHERE id_maquinas = '".$_POST["id_maquinas"]."'";

}
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>