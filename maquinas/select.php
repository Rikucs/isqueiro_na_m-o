<?php  
include("../user/config.php");
 $output = '';
 
 if(isset($_GET["reciclagem"]) == 1){
 
     $sql = "SELECT * FROM maquinas 
     INNER JOIN  combustiveis ON maquinas.combustivel = combustiveis.id_combustiveis
     where maquinas.reciclagem = 1
     ORDER BY id_maquinas DESC";

}else{

     $sql = "SELECT * FROM maquinas 
     INNER JOIN  combustiveis ON maquinas.combustivel = combustiveis.id_combustiveis
     where maquinas.reciclagem = 0
     ORDER BY id_maquinas DESC";

}

 $result = mysqli_query($link, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Id</th>  
                     <th width="10%">Nome</th>  
                     <th width="10%">Matricula</th> 
                     <th width="10%">Combustivel</th>  
                     <th width="10%">Ano</th>
                     <th width="10%">Kilometros</th>  
                     <th width="10%">Horas</th> 
                     <th width="10%">Kilometros iniciais</th>  
                     <th width="10%">Horas iniciais</th>
                     <th width="10%">Observações</th>

                     <th width="5%">Actions</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
          if(isset($_GET["reciclagem"]) == 1){  
               $output .= '  
                     <tr>  
                         <td>'.$row["id_maquinas"].'</td>  
                          <td class="Nome" data-id1="'.$row["id_maquinas"].'" contenteditable>'.$row["Nome"].'</td>  
                          <td class="matricula" data-id2="'.$row["id_maquinas"].'" contenteditable>'.$row["matricula"].'</td>
                          <td class="combustivel" data-id3="'.$row["id_maquinas"].'" contenteditable>'.$row["NOME"].'</td>  
                          <td class="ano" data-id4="'.$row["id_maquinas"].'" contenteditable>'.$row["ano"].'</td>
				      <td class="km" data-id5="'.$row["id_maquinas"].'" contenteditable>'.$row["km"].'</td>  
                          <td class="h" data-id6="'.$row["id_maquinas"].'" contenteditable>'.$row["h"].'</td>
                          <td class="km_iniciais" data-id7="'.$row["id_maquinas"].'" contenteditable>'.$row["km_iniciais"].'</td>  
                          <td class="h_iniciais" data-id8="'.$row["id_maquinas"].'" contenteditable>'.$row["h_iniciais"].'</td>
				      <td class="observacoes" data-id9="'.$row["id_maquinas"].'" contenteditable>'.$row["observacoes"].'</td>          
                          <td>
                          <button type="button" name="delete_btn" data-id10="'.$row["id_maquinas"].'" class="btn btn-xs btn-danger btn_delete">Apagar</button>
                          <button type="button" name="btn_res" id="btn_res" data-id11="'.$row["id_maquinas"].'" class="btn btn-xs btn-success btn_res ">Restaurar</button>
                          </td>  
                </tr>  
               ';
          }else{

               $output .= '  
                    <tr>  
                         <td>'.$row["id_maquinas"].'</td>  
                         <td class="Nome" data-id1="'.$row["id_maquinas"].'" contenteditable>'.$row["Nome"].'</td>  
                         <td class="matricula" data-id2="'.$row["id_maquinas"].'" contenteditable>'.$row["matricula"].'</td>
                         <td class="combustivel" data-id3="'.$row["id_maquinas"].'" contenteditable>'.$row["NOME"].'</td>  
                         <td class="ano" data-id4="'.$row["id_maquinas"].'" contenteditable>'.$row["ano"].'</td>
                         <td class="km" data-id5="'.$row["id_maquinas"].'" contenteditable>'.$row["km"].'</td>  
                         <td class="h" data-id6="'.$row["id_maquinas"].'" contenteditable>'.$row["h"].'</td>
                         <td class="km_iniciais" data-id7="'.$row["id_maquinas"].'" contenteditable>'.$row["km_iniciais"].'</td>  
                         <td class="h_iniciais" data-id8="'.$row["id_maquinas"].'" contenteditable>'.$row["h_iniciais"].'</td>
                         <td class="observacoes" data-id9="'.$row["id_maquinas"].'" contenteditable>'.$row["observacoes"].'</td>          
                         <td>
                         <button type="button" name="delete_btn" data-id10="'.$row["id_maquinas"].'" class="btn btn-xs btn-danger btn_delete">Apagar</button>
                         </td>  
                    </tr>  
               ';
          
          }
      }
      if(isset($_GET["reciclagem"]) == 0){   
          $output .= '  
               <tr>  
                    <td></td>  
                    <td id="Nome" contenteditable></td>  
                    <td id="matricula" contenteditable></td>
			     <td id="combustivel" contenteditable></td>  
                    <td id="ano" contenteditable></td> 
			     <td id="km" contenteditable></td>  
                    <td id="h" contenteditable></td> 
			     <td id="km_iniciais" contenteditable></td>  
                    <td id="h_iniciais" contenteditable></td> 
                    <td id="observacoes" contenteditable></td>  
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
                    <td id="Nome" contenteditable></td>  
                    <td id="matricula" contenteditable></td>
			     <td id="combustivel" contenteditable></td>  
                    <td id="ano" contenteditable></td> 
			     <td id="km" contenteditable></td>  
                    <td id="h" contenteditable></td> 
			     <td id="km_iniciais" contenteditable></td>  
                    <td id="h_iniciais" contenteditable></td> 
                    <td id="observacoes" contenteditable></td> 

                    <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Adicionar</button></td>  
               </tr>  
          ';
     }  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>