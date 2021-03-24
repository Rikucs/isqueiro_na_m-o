 <?php  
 include("../user/config.php");
 $id_maquinas = $_POST["id_maquinas"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE maquinas SET ".$column_name."='".$text."' WHERE id_maquinas='".$id_maquinas."'";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>