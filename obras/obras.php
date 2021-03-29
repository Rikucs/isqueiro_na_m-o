<?php include("../pages/estrutura.php"); ?>

       <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

            </div><!-- Page Headings End -->

            <div class="box">
                <div class="box-head">
                <h3 href="obras.php"class="title"><?php if(isset($_GET["reciclagem"]) == 1){ print "Reciclagem Obras";}else{print "Obras";} ?></h3>
                    <div class="row justify-content-between align-items-center mb-10">
                		<?php if(isset($_GET["reciclagem"]) == 1){ echo "<a href=obras.php>Voltar</a>"; }else{echo "<a href=obras.php?reciclagem=1>Reciclagem </a>";} ?> 
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
           var nome = $('#nome').text();  
           var mostrar = $('#mostrar').text();
    
           if(nome == '')  
           {  
                alert("Enter the Name");  
                return false;  
           }  
           if(mostrar == '')  
           {  
                alert("Enter the mostrar");  
                return false;  
           }
           

           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{nome:nome, mostrar:mostrar},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id_obras, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id_obras:id_obras, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.nome', function(){  
           var id_obras = $(this).data("id1");  
           var nome = $(this).text();  
           edit_data(id_obras, nome, "nome");  
      });  
      $(document).on('blur', '.mostrar', function(){  
           var id_obras = $(this).data("id2");  
           var mostrar = $(this).text();  
           edit_data(id_obras,mostrar, "mostrar");  
      });
        
  
      $(document).on('click', '.btn_delete', function(){  
           var id_obras=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php<?php if(isset($_GET["reciclagem"]) == 1){ print "?reciclagem=1";} ?>",  
                     method:"POST",  
                     data:{id_obras:id_obras},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });
      $(document).on('click', '.btn_res', function(){ 
           var  id_obras=$(this).data("id4");  
           if(confirm("Tens a certeza que queres restaurar?"))  
           {  
                $.ajax({  
                     url:"restaurar.php",    
                     method:"POST",  
                     data:{ id_obras:id_obras},  
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