<?php include("../pages/estrutura.php"); ?>

       <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

            </div><!-- Page Headings End -->

            <div class="box">

                <div class="box-head">
                
                    <h3 href="abastecimentos.php"class="title"><?php if(isset($_GET["reciclagem"]) == 1){ print "Reciclagem Abastecimentos";}else{print " Abastecimentos";} ?></h3>
                    <div class="row justify-content-between align-items-center mb-10">
                		<?php if(isset($_GET["reciclagem"]) == 1){ echo "<a href=abastecimentos.php>Voltar</a>"; }else{echo "<a href=abastecimentos.php?reciclagem=1>Reciclagem </a>";} ?> 
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
           var adata = $('#adata').text();           
           var maquina = $('#maquina').text();
           var obra = $('#obra').text();
           var combustivel = $('#combustivel').text();
           var litros = $('#litros').text();  
           var km = $('#km').text();   
           var horas = $('#horas').text();  
           var assinatura = $('#assinatura').text();    
           

           if(adata == '')  
           {  
                alert("COloque a data");  
                return false;  
           } 
           if(maquina == '')  
           {  
                alert("Nome da maquina");  
                return false;  
           } 
           if(obra == '')  
           {  
                alert("Coloque a obra");  
                return false;  
           }
           if(combustivel == '')  
           {  
                alert("Coloque o tipo de combustivel");  
                return false;  
           }
           if(litros == '')  
           {  
                alert("Introduza a quantidade de litros");  
                return false;  
           }  

           if(km == '')  
           {  
                alert("Coloque os kilometros");  
                return false;  
           }  

           if(horas == '')  
           {  
                alert("Coloque o tempo de uso");  
                return false;  
           }  

          if(assinatura == '')  
           {  
                alert("Intruduza a sua assinatura");  
                return false;  
           }

           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{adata:adata, maquina:maquina, obra:obra, combustivel:combustivel, litros:litros, km:km, horas:horas, assinatura:assinatura },  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data( id_abastecimentos, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{  id_abastecimentos:  id_abastecimentos, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.adata', function(){  
           var  id_abastecimentos = $(this).data("id1");  
           var adata = $(this).text();  
           edit_data( id_abastecimentos, adata, "adata");  
      });
      $(document).on('blur', '.maquina', function(){  
           var  id_abastecimentos = $(this).data("id2");  
           var maquina = $(this).text();  
           edit_data( id_abastecimentos,maquina, "maquina");  
      });  
      $(document).on('blur', '.obra', function(){  
           var  id_abastecimentos = $(this).data("id3");  
           var obra = $(this).text();  
           edit_data( id_abastecimentos,obra, "obra");  
      });
      $(document).on('blur', '.combustivel', function(){  
           var  id_abastecimentos = $(this).data("id4");  
           var combustivel = $(this).text();  
           edit_data( id_abastecimentos,combustivel, "combustivel");  
      });
      $(document).on('blur', '.litros', function(){  
           var  id_abastecimentos = $(this).data("id5");  
           var litros = $(this).text();  
           edit_data( id_abastecimentos, litros, "litros");  
      });  

      $(document).on('blur', '.km', function(){  
           var  id_abastecimentos = $(this).data("id6");  
           var km = $(this).text();  
           edit_data( id_abastecimentos, km, "km");  
      });  

      $(document).on('blur', '.horas', function(){  
           var  id_abastecimentos = $(this).data("id7");  
           var horas = $(this).text();  
           edit_data( id_abastecimentos, horas, "horas");  
      });  

      $(document).on('blur', '.assinatura', function(){  
           var  id_abastecimentos = $(this).data("id8");  
           var assinatura = $(this).text();  
           edit_data( id_abastecimentos, assinatura, "assinatura");  
      });  
  
      $(document).on('click', '.btn_delete', function(){  
           var  id_abastecimentos=$(this).data("id9");  
           if(confirm("Tem certeza que quer apagar?"))  
           {  
                $.ajax({  
                     url:"delete.php<?php if(isset($_GET["reciclagem"]) == 1){ print "?reciclagem=1";} ?>",    
                     method:"POST",  
                     data:{ id_abastecimentos:id_abastecimentos},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });
      $(document).on('click', '.btn_res', function(){ 
           var  id_abastecimentos=$(this).data("id10");  
           if(confirm("Tens a certeza que queres restaurar?"))  
           {  
                $.ajax({  
                     url:"restaurar.php",    
                     method:"POST",  
                     data:{ id_abastecimentos:id_abastecimentos},  
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