<?php  
include("../user/config.php");;
 $sql = "INSERT INTO users(username, password, adm, nfc) VALUES('".$_POST["username"]."', '".$_POST["password"]."','".$_POST["adm"]."', '".$_POST["nfc"]."')";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 