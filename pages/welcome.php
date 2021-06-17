<?php 
include("estrutura.php"); 
include("../user/config.php"); 
$output = ''; 
$sql = "SELECT * FROM abastecimentos where abastecimentos.reciclagem = 0 and aceite = 0";  
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) > 0)  
{  
    echo ' 
    <div class="content-body">
         <div class="box">
             <div class="box-head">
                 <h4 class="title">Novos Abastecimentos</h4>
             </div>
             <div class="box-body">
             <!-- News & Updates Inner Start -->
                 <div class="news-update-inner">
                     <!-- News Item -->
                     <div class="news-item">
                         <!-- Content -->
                         <div class="content">';
     while($row = mysqli_fetch_array($result))  
     { 

        echo ' 
                                   <!-- Category -->
                                   <div class="categories">
                                       <a href="#" class="new">Novo Registro</a>
                                   </div>
                                   <!-- Title -->
                                   <h4 class="title"><a href="#">Novo registro enviado pelo user '.$row["assinatura"].'.</a></h4>
                                   <!-- Meta -->
                                   <ul class="meta">
                                       <li><a>By:'.$row["assinatura"].'</a></li>
                                   </ul>
                                   </br>';
     }
     echo'
                               </div>
   
                           </div>
   
                       </div>
   
                   </div>
   
               </div>
   
          </div> 
               
          ';
        
    }

?>


        
	    <!--html Global Vendor, plugins & Activation JS -->
    <script src="../assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
    <!--Plugins JS-->
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/tippy4.min.js.js"></script>
    <!--Main JS-->
    <script src="../assets/js/main.js"></script>
 
    

	
	

    <!-- JS
============================================ -->

</body>
</html>