<?php  
include("../user/config.php");


if(isset($_GET["reciclagem"]) == '1'){

	$sql = "DELETE FROM abastecimentos WHERE id_abastecimentos = '".$_POST["id_abastecimentos"]."'";   

}else{

	$sql = "UPDATE abastecimentos SET reciclagem = '1' WHERE id_abastecimentos = '".$_POST["id_abastecimentos"]."'";

}
 if(mysqli_query($link, $sql))  

 {  
      echo 'Data Deleted';  
 }
