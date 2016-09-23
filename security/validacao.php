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
		echo " sua senha está incorreta ";
		header("logation: ../index.php");
	}

 ?>