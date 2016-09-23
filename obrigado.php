<!DOCTYPE html>
<?php 
	$nome = $_GET['nome'];
	$email =  $_GET['email'];
	$telefone = $_GET['telefone'];
	$recado = $_GET['recado'];
 ?>
<html>
<head>
	<title>Status Formulario</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="recado">
		<p>
			<?php 
				if (!$nome || !$email || !$telefone || !$recado) {
					echo  "Por favor, preencha todos os campos!";
				}else{
					echo "Olá $nome , sua mensagem foi enviada com sucesso! <br>"; 
					echo "Entraremos em contato no seu email: $email ou no telefone: $telefone. <br>"; 
					echo "Obrigado!";	
				}	
			 ?>		 	
		</p>
	</div>

</body>
</html>








