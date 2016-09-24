<?php 
	session_start();	
	session_unset();
	session_destroy();
	echo "<br><br><p>Seu LOGOUT efetuado com sucesso!</p>";
	echo "<p>Você será redirecionado a pagina inicial em instantes...</p></br>";
	include ("../conexao.php");
	mysql_close();	
	header("refresh: 4; url= ../index.php");
 ?>