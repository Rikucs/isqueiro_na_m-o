<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}
if(!isset($_SESSION["adm"])){
	
	echo  "<script>alert('Não tem permissao');</script>";
	header('location: ../pages/welcome2.php?erro=1');	
}

include("../pages/estrutura.php");


?>

 
	

       <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

            </div><!-- Page Headings End -->

            <div class="box">
                <div class="box-head">
                <h3 href="maquinas.php"class="title"><?php if(isset($_GET["reciclagem"]) == 1){ print "Reciclagem Maquinas ";}else{print " Maquinas";} ?></h3>
                    <div class="row justify-content-between align-items-center mb-10">
                		<?php if(isset($_GET["reciclagem"]) == 1){ echo "<a href=maquinas.php>Voltar</a>"; }else{echo "<a href=maquinas.php?reciclagem=1>Reciclagem </a>";} ?> 
                		<?php if(isset($_GET["reciclagem"]) == 0){ echo "<a href=relatorio.php>Relatorio</a>"; } ?>
                	</div>
                </div>
                <div class="box-body">

                	<div id="live_data"></div> 


                </div>
            </div>

            <div class="row"></div>
	


	    <!-- Global Vendor, plugins & Activation JS -->
    <script src="../assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
    <!--Plugins JS-->
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/tippy4.min.js.js"></script>
    <!--Main JS-->
    <script src="../assets/js/main.js"></script>
 
    <!-- tabela -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php<?php if(isset($_GET["reciclagem"]) == 1){ print "?reciclagem=1";} ?>",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var Nome = $('#Nome').text();  
           var matricula = $('#matricula').text();
           var combustivel = $('#combustivel').text();  
           var ano = $('#ano').text(); 
           var km = $('#km').text();  
           var h = $('#h').text(); 
           var km_iniciais = $('#km_iniciais').text();  
           var h_iniciais = $('#h_iniciais').text(); 
           var observacoes = $('#observacoes').text();    
           if(Nome == '')  
           {  
                alert("Enter the Name");  
                return false;  
           }  
           if(matricula == '')  
           {  
                alert("Enter the matricula");  
                return false;  
           }
           if(combustivel == '')  
           {  
                alert("Enter the combustivel type");  
                return false;  
           }  
           if(ano == '')  
           {  
                alert("Enter the ano");  
                return false;  
           }
           if(km == '')  
           {  
                alert("Enter the km");  
                return false;  
           }  
           if(h == '')  
           {  
                alert("Enter the hours");  
                return false;  
           }
           if(km_iniciais == '')  
           {  
                alert("Enter the km at the beggining");  
                return false;  
           }  
           if(h_iniciais == '')  
           {  
                alert("Enter the hours at the beggining");  
                return false;  
           }
          if(observacoes == '')  
           {  
                alert("Enter observacoes");  
                return false;  
           }

           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{Nome:Nome, matricula:matricula, combustivel:combustivel, ano:ano, km:km, h:h, km_iniciais:km_iniciais, h_iniciais:h_iniciais, observacoes:observacoes },  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id_maquinas, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id_maquinas:id_maquinas, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.Nome', function(){  
           var id_maquinas = $(this).data("id1");  
           var Nome = $(this).text();  
           edit_data(id_maquinas, Nome, "Nome");  
      });  
      $(document).on('blur', '.matricula', function(){  
           var id_maquinas = $(this).data("id2");  
           var matricula = $(this).text();  
           edit_data(id_maquinas,matricula, "matricula");  
      });
      $(document).on('blur', '.combustivel', function(){  
           var id_maquinas = $(this).data("id3");  
           var combustivel = $(this).text();  
           edit_data(id_maquinas, combustivel, "combustivel");  
      });  
      $(document).on('blur', '.ano', function(){  
           var id_maquinas = $(this).data("id4");  
           var ano = $(this).text();  
           edit_data(id_maquinas,ano, "ano");  
      });
      $(document).on('blur', '.km', function(){  
           var id_maquinas = $(this).data("id5");  
           var km = $(this).text();  
           edit_data(id_maquinas, km, "km");  
      });  
      $(document).on('blur', '.h', function(){  
           var id_maquinas = $(this).data("h");  
           var h = $(this).text();  
           edit_data(id_maquinas,h, "h");  
      });
      $(document).on('blur', '.km_iniciais', function(){  
           var id_maquinas = $(this).data("id7");  
           var km_iniciais = $(this).text();  
           edit_data(id_maquinas, km_iniciais, "km_iniciais");  
      });  
      $(document).on('blur', '.h_iniciais', function(){  
           var id_maquinas = $(this).data("id8");  
           var h_iniciais = $(this).text();  
           edit_data(id_maquinas,h_iniciais, "h_iniciais");  
      });
      $(document).on('blur', '.observacoes', function(){  
           var id_maquinas = $(this).data("id9");  
           var observacoes = $(this).text();  
           edit_data(id_maquinas, observacoes, "observacoes");  
      });  
  
      $(document).on('click', '.btn_delete', function(){  
           var id_maquinas=$(this).data("id10");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php<?php if(isset($_GET["reciclagem"]) == 1){ print "?reciclagem=1";} ?>",  
                     method:"POST",  
                     data:{id_maquinas:id_maquinas},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });
      $(document).on('click', '.btn_res', function(){ 
           var  id_maquinas=$(this).data("id11");  
           if(confirm("Tens a certeza que queres restaurar?"))  
           {  
                $.ajax({  
                     url:"restaurar.php",    
                     method:"POST",  
                     data:{ id_maquinas:id_maquinas},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script> 

	
</body>		

    <!-- JS
============================================ -->

</body>

</html>