<?php  
include("../user/config.php");
 $output = '';  
 if(isset($_GET["reciclagem"]) == 1){
     $sql = "SELECT * FROM obras where reciclagem = 1 ORDER BY id_obras DESC"; 
 }else{
     $sql = "SELECT * FROM obras where reciclagem = 0 ORDER BY id_obras DESC"; 
 }     
 $result = mysqli_query($link, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="50%">Nome</th>  
                     <th width="30%">Horas</th> 


                     <th width="10%">Actions</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      { 
          if(isset($_GET["reciclagem"]) == 1){ 
               $output .= '  
                    <tr>  
                         <td>'.$row["id_obras"].'</td>  
                         <td class="nome" data-id1="'.$row["id_obras"].'" contenteditable>'.$row["nome"].'</td>  
                         <td class="Horas" data-id2="'.$row["id_obras"].'" contenteditable>'.$row["Horas"].' H</td>
                         <td>
                         <button type="button" name="delete_btn" data-id3="'.$row["id_obras"].'" class="btn btn-xs btn-danger btn_delete">Delete</button>
                         <button type="button" name="btn_res" id="btn_res" data-id4="'.$row["id_obras"].'" class="btn btn-xs btn-success btn_res ">Restaurar</button>
                         </td>  
                    </tr>  
               ';
          }else{
               $output .= '  
               <tr>  
                    <td>'.$row["id_obras"].'</td>  
                    <td class="nome" data-id1="'.$row["id_obras"].'" contenteditable>'.$row["nome"].'</td>  
                    <td class="Horas" data-id2="'.$row["id_obras"].'" contenteditable>'.$row["Horas"].' H</td>
                    <td>
                    <a class="view button button-box button-xs button-primary" href="consumo.php?obras='.$row["id_obras"].'""><i class="zmdi zmdi-more"> </i></a>
                    <button type="button" name="delete_btn" data-id3="'.$row["id_obras"].'" class="btn btn-xs btn-danger btn_delete">Apagar</button>
                    </td>  
               </tr>  
          ';    
          }  
      }
      if(isset($_GET["reciclagem"]) == 0){    
          $output .= '  
               <tr>  
                    <td></td>  
                    <td id="nome" contenteditable></td>  
                    <td id="Horas" contenteditable></td>
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
                    <td id="nome" contenteditable></td>  
                    <td id="Horas" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Adicionar</button></td>  
               </tr>  
          ';
     }  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>