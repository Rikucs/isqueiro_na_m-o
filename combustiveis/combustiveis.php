<?php include("../pages/estrutura.php"); ?>

       <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

            </div><!-- Page Headings End -->

            <div class="box">
                <div class="box-head">
                    <h3 href="combustiveis.php"class="title"><?php if(isset($_GET["reciclagem"]) == 1){ print "Reciclagem Combustiveis";}else{print "Combustiveis";} ?></h3>
                    <div class="row justify-content-between align-items-center mb-10">
                		<?php if(isset($_GET["reciclagem"]) == 1){ echo "<a href=combustiveis.php>Voltar</a>"; }else{echo "<a href=combustiveis.php?reciclagem=1>Reciclagem </a>";} ?> 
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
           var NOME = $('#NOME').text();  
           var preco = $('#preco').text();
    
           if(NOME == '')  
           {  
                alert("Enter the Name");  
                return false;  
           }  
           if(preco == '')  
           {  
                alert("Enter the preco");  
                return false;  
           }
           

           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{NOME:NOME, preco:preco},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id_combustiveis, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id_combustiveis:id_combustiveis, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.NOME', function(){  
           var id_combustiveis = $(this).data("id1");  
           var NOME = $(this).text();  
           edit_data(id_combustiveis, NOME, "NOME");  
      });  
      $(document).on('blur', '.preco', function(){  
           var id_combustiveis = $(this).data("id2");  
           var preco = $(this).text();  
           edit_data(id_combustiveis,preco, "preco");  
      });
        
  
      $(document).on('click', '.btn_delete', function(){  
           var id_combustiveis=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php<?php if(isset($_GET["reciclagem"]) == 1){ print "?reciclagem=1";} ?>", 
                     method:"POST",  
                     data:{id_combustiveis:id_combustiveis},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });
      $(document).on('click', '.btn_res', function(){ 
           var  id_combustiveis=$(this).data("id4");  
           if(confirm("Tens a certeza que queres restaurar?"))  
           {  
                $.ajax({  
                     url:"restaurar.php",    
                     method:"POST",  
                     data:{ id_combustiveis:id_combustiveis},  
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