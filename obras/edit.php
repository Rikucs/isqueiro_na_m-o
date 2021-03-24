 <?php  
 include("../user/config.php");
 $id_obras = $_POST["id_obras"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE obras SET ".$column_name."='".$text."' WHERE id_obras='".$id_obras."'";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>