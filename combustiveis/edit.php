 <?php
     include("../user/config.php");
     $id_combustiveis = $_POST["id_combustiveis"];
     $text = $_POST["text"];
     $column_name = $_POST["column_name"];
     $sql = "UPDATE combustiveis SET " . $column_name . "='" . $text . "' WHERE id_combustiveis='" . $id_combustiveis . "'";
     if (mysqli_query($link, $sql)) {
          echo 'Data Updated';
     }
     ?>