<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "backend2";

header('Content-Type: text/html; charset=utf-8');

$conexao  = mysql_connect($servidor, $usuario, $senha);
mysql_set_charset( "utf8", $conexao );
if ($conexao){
	$selecao = mysql_select_db($banco);
	if (!$selecao)
		echo "Erro ao Selecionar a Base de Dados";
}else
		echo "Erro ao Selecionar o servidor";
 ?>