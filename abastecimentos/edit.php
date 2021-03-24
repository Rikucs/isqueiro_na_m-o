 <?php  
 include("../user/config.php");
 $id_abastecimentos = $_POST["id_abastecimentos"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE abastecimentos SET ".$column_name."='".$text."' WHERE id_abastecimentos='".$id_abastecimentos."'";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>