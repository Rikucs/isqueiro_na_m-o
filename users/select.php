<?php  
include("../user/config.php");
 $output = ''; 
 
 if(isset($_GET["reciclagem"]) == 1){

     $sql = "SELECT * FROM users  where reciclagem = 1 ORDER BY id_user DESC";  

 }else{

     $sql = "SELECT * FROM users  where reciclagem = 0 ORDER BY id_user DESC";  

 }     
$result = mysqli_query($link, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="20%">Username</th>  
                     <th width="30%">Password</th>
                     <th width="10%">Adm Level</th>  
                     <th width="20%">NFC</th>  
                     <th width="10%">Actions</th>  
                </tr>'; 

 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      { 
          if(isset($_GET["reciclagem"]) == 1){  
               $output .= '  
                    <tr>  
                         <td>'.$row["id_user"].'</td>  
                         <td class="username" data-id1="'.$row["id_user"].'" contenteditable>'.$row["username"].'</td>  
                         <td class="password" data-id2="'.$row["id_user"].'" contenteditable>'.$row["password"].'</td>
                         <td class="adm" data-id3="'.$row["id_user"].'" contenteditable>'.$row["adm"].'</td>  
                         <td class="nfc" data-id4="'.$row["id_user"].'" contenteditable>'.$row["nfc"].'</td>
        
                         <td>
                         <button type="button" name="delete_btn" data-id5="'.$row["id_user"].'" class="btn btn-xs btn-danger btn_delete">Apagar</button>
                         <button type="button" name="btn_res" id="btn_res" data-id6="'.$row["id_user"].'" class="btn btn-xs btn-success btn_res ">Restaurar</button>
                         </td>  
                    </tr>  
               ';
          }else{
               $output .= '  
               <tr>  
                    <td>'.$row["id_user"].'</td>  
                    <td class="username" data-id1="'.$row["id_user"].'" contenteditable>'.$row["username"].'</td>  
                    <td class="password" data-id2="'.$row["id_user"].'" contenteditable>'.$row["password"].'</td>
                    <td class="adm" data-id3="'.$row["id_user"].'" contenteditable>'.$row["adm"].'</td>  
                    <td class="nfc" data-id4="'.$row["id_user"].'" contenteditable>'.$row["nfc"].'</td>
   
                    <td>
                    <button type="button" name="delete_btn" data-id5="'.$row["id_user"].'" class="btn btn-xs btn-danger btn_delete">Apagar</button>
                    </td>  
               </tr>  
          ';   
          }  
     } 
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>