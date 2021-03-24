 <?php  
 include("../user/config.php");
 $id_user = $_POST["id_user"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE users SET ".$column_name."='".$text."' WHERE id_user='".$id_user."'";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>