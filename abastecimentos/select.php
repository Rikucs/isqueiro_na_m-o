<?php  
include("../user/config.php");
 $output = ''; 

 $query = "SELECT id_maquinas, Nome FROM maquinas";
 $result = mysqli_query($link, $query);
 $opcoes = "";	 

 while($row = mysqli_fetch_array($result))
{
	$opcoes = $opcoes."<option>$row[0] - $row[1]";
}
$query = "SELECT id_obras, nome FROM obras";
$result = mysqli_query($link, $query);
$opcoes1 = "";	 

while($row = mysqli_fetch_array($result))
{
    $opcoes1 = $opcoes1."<option>$row[0] - $row[1]";
} $query = "SELECT id_combustiveis, NOME FROM combustiveis";
$result = mysqli_query($link, $query);
$opcoes2 = "";	 

while($row = mysqli_fetch_array($result))
{
    $opcoes2 = $opcoes2."<option>$row[0] - $row[1]";
}
if(isset($_GET["reciclagem"]) == 1){
 $sql = "SELECT * FROM abastecimentos 
 INNER JOIN obras ON abastecimentos.obra = obras.id_obras
 INNER JOIN  maquinas ON abastecimentos.maquina = maquinas.id_maquinas
 INNER JOIN  combustiveis ON abastecimentos.combustivel = combustiveis.id_combustiveis
 where abastecimentos.reciclagem = 1 and aceite = 1
 ORDER BY id_abastecimentos DESC";  
 
}else{

 $sql = "SELECT * FROM abastecimentos 
 INNER JOIN obras ON abastecimentos.obra = obras.id_obras
 INNER JOIN  maquinas ON abastecimentos.maquina = maquinas.id_maquinas
 INNER JOIN  combustiveis ON abastecimentos.combustivel = combustiveis.id_combustiveis
 where abastecimentos.reciclagem = 0 and aceite = 1
 ORDER BY id_abastecimentos DESC";  
 
}
 $result = mysqli_query($link, $sql);
  
 $output .= '  
     

      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="6%">Id</th>  
                     <th width="11%">Data</th>
                     <th width="11%">Maquina</th>   
                     <th width="11%">Obra</th>
                     <th width="11%">Combustivel</th> 
                     <th width="11%">Litros</th>  
                     <th width="11%">Kilometros</th>
                     <th width="11%">Horas</th> 
                     <th width="11%">Assinatura</th> 
                     <th width="6%">Actions</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      { 
        if(isset($_GET["reciclagem"]) == 1){ 
           $output .= '  
                <tr>  
                     <td>'.$row["id_abastecimentos"].'</td>  
                     <td class="adata" data-id1="'.$row["id_abastecimentos"].'" >'.$row["adata"].'</td>  
                     <td class="maquina" data-id2="'.$row["id_abastecimentos"].'" contenteditable>'.$row["Nome"].'</td>
                     <td class="obra" data-id3="'.$row["id_abastecimentos"].'" contenteditable>'.$row["nome"].'</td>
                     <td class="combustivel" data-id4="'.$row["id_abastecimentos"].'" contenteditable>'.$row["NOME"].'</td>
                     <td class="litros" data-id5="'.$row["id_abastecimentos"].'" contenteditable>'.$row["litros"].'</td>  
                     <td class="km" data-id6="'.$row["id_abastecimentos"].'" contenteditable>'.$row["km"].'</td>
                     <td class="horas" data-id7="'.$row["id_abastecimentos"].'" contenteditable>'.$row["horas"].'</td>  
                     <td class="assinatura" data-id8="'.$row["id_abastecimentos"].'" contenteditable>'.$row["assinatura"].'</td>
                     <td>
                        <button type="button" name="delete_btn" data-id9="'.$row["id_abastecimentos"].'" class="btn btn-xs btn-danger btn_delete">Delete</button>
                        <button type="button" name="btn_res" id="btn_res" data-id10="'.$row["id_abastecimentos"].'" class="btn btn-xs btn-success btn_res ">Restaurar</button>
                     </td>

                </tr>  
           ';
           
        }else{
           $output .= '  
                <tr>  
                     <td>'.$row["id_abastecimentos"].'</td>  
                     <td class="adata" data-id1="'.$row["id_abastecimentos"].'" >'.$row["adata"].'</td>  
                     <td class="maquina" data-id2="'.$row["id_abastecimentos"].'" contenteditable>'.$row["Nome"].'</td>
                     <td class="obra" data-id3="'.$row["id_abastecimentos"].'" contenteditable>'.$row["nome"].'</td>
                     <td class="combustivel" data-id4="'.$row["id_abastecimentos"].'" contenteditable>'.$row["NOME"].'</td>
                     <td class="litros" data-id5="'.$row["id_abastecimentos"].'" contenteditable>'.$row["litros"].'</td>  
                     <td class="km" data-id6="'.$row["id_abastecimentos"].'" contenteditable>'.$row["km"].'</td>
                     <td class="horas" data-id7="'.$row["id_abastecimentos"].'" contenteditable>'.$row["horas"].'</td>  
                     <td class="assinatura" data-id8="'.$row["id_abastecimentos"].'" contenteditable>'.$row["assinatura"].'</td>
         
                     <td><button type="button" name="delete_btn" data-id9="'.$row["id_abastecimentos"].'" class="btn btn-xs btn-danger btn_delete">Apagar</button></td>  
                </tr>  
           ';
          }
        }     
        if(isset($_GET["reciclagem"]) == 0){ 
          $output .= '  
            <tr>  
                <td></td>  
<<<<<<< Updated upstream
                <td id="adata" ></td>  
                <td id="maquina" contenteditable></td>
                <td id="obra" contenteditable></td>
                <td id="combustivel" contenteditable></td>
=======
                <td id="adata" >'.date("Y-m-d").'</td>  
                <td id="maquina" contenteditable><select name="maquina" required>
                <option hidden></option>
               '.$opcoes.'
               </select></td>
                <td id="obra" contenteditable><select name="obra" required>
                <option hidden></option>
               '.$opcoes1.'
               </select></td>
                <td id="combustivel" contenteditable><select name="combustivel" required>
                <option hidden></option>
               '.$opcoes2.'
               </select></td>
>>>>>>> Stashed changes
                <td id="litros" contenteditable></td>  
                <td id="km" contenteditable></td> 
                <td id="horas" contenteditable></td>  
                <td id="assinatura" contenteditable></td>   
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Adicionar</button></td>  
            </tr>  
          ';
        }
      
 }else{

      if(isset($_GET["reciclagem"]) == 0){ 
        $output .=  '  
             <tr>  
                  <td></td>  
                  <td id="adata" ></td> 
                  <td id="maquina" contenteditable></td> 
                  <td id="obra" contenteditable></td>
                  <td id="combustivel" contenteditable></td>
                  <td id="litros" contenteditable></td>  
                  <td id="km" contenteditable></td> 
                  <td id="horas" contenteditable></td>  
                  <td id="assinatura" contenteditable></td> 
                  <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Adicionar</button></td>  
            </tr>  
        ';
    }  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>