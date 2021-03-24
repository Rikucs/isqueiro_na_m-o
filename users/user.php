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
                    <h3 href="user.php"class="title"><?php if(isset($_GET["reciclagem"]) == 1){ print "Reciclagem Users";}else{print " User";} ?></h3>
                    <div class="row justify-content-between align-items-center mb-10">
                		<?php if(isset($_GET["reciclagem"]) == 1){ echo "<a href=user.php>Voltar</a>"; }else{echo "<a href=user.php?reciclagem=1>Reciclagem </a>";} ?> 
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
           var username = $('#username').text();  
           var password = $('#password').text();
           var adm = $('#adm').text();  
           var nfc = $('#nfc').text();
    
           if(username == '')  
           {  
                alert("Enter the username");  
                return false;  
           }  
           if(password == '')  
           {  
                alert("Enter the password");  
                return false;  
           }
           if(adm == '')  
           {  
                alert("Enter the adm");  
                return false;  
           }  
           if(nfc == '')  
           {  
                alert("Enter the nfc");  
                return false;  
           }
           

           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{username:username, password:password, adm:adm, nfc:nfc},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id_user, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id_user:id_user, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.username', function(){  
           var id_user = $(this).data("id1");  
           var username = $(this).text();  
           edit_data(id_user, username, "username");  
      });  
      $(document).on('blur', '.password', function(){  
           var id_user = $(this).data("id2");  
           var password = $(this).text();  
           edit_data(id_user,password, "password");  
      });
            $(document).on('blur', '.adm', function(){  
           var id_user = $(this).data("id3");  
           var adm = $(this).text();  
           edit_data(id_user, adm, "adm");  
      });  
      $(document).on('blur', '.nfc', function(){  
           var id_user = $(this).data("id4");  
           var nfc = $(this).text();  
           edit_data(id_user,nfc, "nfc");  
      });
        
  
      $(document).on('click', '.btn_delete', function(){  
           var id_user=$(this).data("id5");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php<?php if(isset($_GET["reciclagem"]) == 1){ print "?reciclagem=1";} ?>",  
                     method:"POST",  
                     data:{id_user:id_user},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });
      $(document).on('click', '.btn_res', function(){ 
           var  id_user=$(this).data("id6");  
           if(confirm("Tens a certeza que queres restaurar?"))  
           {  
                $.ajax({  
                     url:"restaurar.php",    
                     method:"POST",  
                     data:{ id_user:id_user},  
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