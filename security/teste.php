<?php 
	session_start();
	$boratestar = $_SESSION['teste'];
	$idUsuario = $_SESSION['idUsuario'];
	echo $boratestar;
	echo "<br>";
	echo $idUsuario;	
 ?>