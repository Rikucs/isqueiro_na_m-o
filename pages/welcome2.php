<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
if(isset($_GET["erro"]) == 1){
    echo  "<script>alert('Não tens permissao');</script>";
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Sem permissão</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
		<a href="logout.php" class="btn btn-warning">Sign Out of Your Account</a>
        
    </p>
	<p>
		<a href="form.html" class="btn btn-danger">Criar Registo de Aluno</a>
		<a href="form_consulta.php" class="btn btn-danger">Ver Alunos na base de dados</a>
		<a href="update.php" class="btn btn-danger">Alterar Registo na base de dados</a>
		<a href="delete.php" class="btn btn-danger">Deletar Alunos da base de dados</a>
	</p>	
</body>
</html>