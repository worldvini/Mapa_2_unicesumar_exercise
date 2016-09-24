<?php
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	//cria menu superior
	function menuPrincipal(){
		$str = "select idCategoria, titulo from categoria";
		$requisicao = mysql_query($str);
			echo "<li><a href=index.php>Home<a/></li>";
		while ($valor = mysql_fetch_array($requisicao)) {
			echo "<li><a href=index.php?pagina=meio&idCategoria=$valor[idCategoria]&titulo=$valor[titulo]>$valor[titulo]</a></li>";
		}
			echo "<li><a href=index.php?pagina=contato>Contato<a/></li>";
			echo "<li><a href=index.php?pagina=login>Painel Adm<a/></li>";
	}
	//cria menu lateral caso necessário
	function menulateral(){
		$str="select idCategoria, idConteudo, titulo from conteudo where idCategoria=$_GET[idCategoria]";
		$requisicao = mysql_query($str);
		while($valor = mysql_fetch_array($requisicao)){
			echo "<li><a href=index.php?pagina=meio&pag=conteudo&idCategoria=$valor[idCategoria]&idConteudo=$valor[idConteudo]>$valor[titulo]</a></li>";
		}
	}
	//cria o rodapé
	function menuRodape($idCategoria){
		$str = "select * from conteudo where idCategoria ='$idCategoria'";
		$requisicao = mysql_query($str);
		while ($valor = mysql_fetch_array($requisicao)) {
			echo "<li><a href=index.php?pagina=meio&pag=conteudo&idCategoria=$valor[idCategoria]&idConteudo=$valor[idConteudo]>$valor[titulo]</a></li>";
		}
	}
	
?>	
