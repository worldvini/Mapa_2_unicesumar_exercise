<?php 
	function inserir($nomeTabela, $nomeCampo, $info){
		$str = "INSERT INTO " . $nomeTabela . " ($nomeCampo) VALUES ($info)";
		$_SESSION['teste'] = $str; // pagina teste.php, testa o resultado da string
		$requisicao = mysql_query($str);
		if ($requisicao) {
			$retorno="done";
			return $retorno;
		}else{
			$retorno="error";
			return $retorno;
		}		
	}
	function atualizar($nomeTabela, $info, $where){
		$str = "UPDATE " . $nomeTabela . " SET $info WHERE $where";
		$_SESSION['teste'] = $str; // pagina teste.php, testa o resultado da string
		$requisicao = mysql_query($str);
		if ($requisicao) {
			$retorno="done";
			return $retorno;
		}else{
			$retorno="error";
			return $retorno;
		}
	}
	function excluir($nomeTabela, $where){
		$str = "DELETE FROM " . $nomeTabela . " WHERE $where";
		$requisicao = mysql_query($str);
		$_SESSION['teste'] = $str; // pagina teste.php, testa o resultado da string
		if ($requisicao) {
			$retorno="done";
			return $retorno;
		}else{
			$retorno="error";
			return $retorno;
		}
	}
 ?>