<?php 
	session_start();	
	include ("../conexao.php");
	$login = trim($_POST["login"]);
	$senha = trim($_POST["senha"]);
	$str = "select * from usuario where loginUsuario ='$login' and senhaUsuario ='$senha' ";
	$requisicao = mysql_query($str);
	$conteudo = mysql_fetch_array($requisicao);
	$true = mysql_num_rows($requisicao);

	if($true == 1){		
		$_SESSION["login"] = $_POST["login"];
		$_SESSION["nome"] = $conteudo[nomeUsuario];
		header("location: index.php");
	}else{
		echo " Seu login ou senha está incorreto. <br>";
		echo " Você será redirecionado a pagina login em instantes...";
		//sleep(4);
		header( "refresh:4; url= ../index.php?pagina=login"); // aguarda 4 segundos e redireciona o de volta a pagina de login.
		//header("location: ../index.php?pagina=login");
	}
 ?>