<?php  
include("../user/config.php");
 $output = '';  
 if(isset($_GET["reciclagem"]) == 1){
     $sql = "SELECT * FROM combustiveis where reciclagem = 1 ORDER BY id_combustiveis DESC";  
 }else{
     $sql = "SELECT * FROM combustiveis where reciclagem = 0 ORDER BY id_combustiveis DESC";  
 }
 $result = mysqli_query($link, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="50%">Nome</th>  
                     <th width="30%">Preço</th> 


                     <th width="10%">Actions</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      { 
          if(isset($_GET["reciclagem"]) == 1){ 
           
               $output .= '
               <tr>  
                     <td>'.$row["id_combustiveis"].'</td>  
                     <td class="NOME" data-id1="'.$row["id_combustiveis"].'" contenteditable>'.$row["NOME"].'</td>  
                     <td class="preco" data-id2="'.$row["id_combustiveis"].'" contenteditable>'.$row["preco"].'</td>
        
                     <td>
                     <button type="button" name="delete_btn" data-id3="'.$row["id_combustiveis"].'" class="btn btn-xs btn-danger btn_delete">Delete</button>
                     <button type="button" name="btn_res" id="btn_res" data-id4="'.$row["id_combustiveis"].'" class="btn btn-xs btn-success btn_res ">Restaurar</button>
                     </td>  
                </tr>  
               ';
          }else{

               $output .= '
               <tr>  
                     <td>'.$row["id_combustiveis"].'</td>  
                     <td class="NOME" data-id1="'.$row["id_combustiveis"].'" contenteditable>'.$row["NOME"].'</td>  
                     <td class="preco" data-id2="'.$row["id_combustiveis"].'" contenteditable>'.$row["preco"].'</td>
        
                     <td>
                     <button type="button" name="delete_btn" data-id3="'.$row["id_combustiveis"].'" class="btn btn-xs btn-danger btn_delete">Apagar</button>
                     
                     </td>  
                </tr>  
               ';

          }  
      }
      if(isset($_GET["reciclagem"]) == 0){       
          $output .= '  
               <tr>  
                    <td></td>  
                    <td id="NOME" contenteditable></td>  
                    <td id="preco" contenteditable></td>
                    <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Adicionar</button></td>  
               </tr>  
          ';
      }  
 }  
 else  
 {  
     if(isset($_GET["reciclagem"]) == 0){  
          $output .=  '  
                <tr>  
                     <td></td>  
                    <td id="NOME" contenteditable></td>  
                    <td id="preco" contenteditable></td>
                    <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Adicionar</button></td>  
                </tr>  
          ';  
     }     
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>