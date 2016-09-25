<?php 
	//excluir algo da tabela verificando a ação requisitada
	if ($_GET['acao'] == "excluir") {
		$id = $_GET['id'];
		$status = excluir("contato","idContato = $id");
		if ($status == "done") {
			?>
			<script type="text/javascript">
				alert("Registro excluido com sucesso.");
				window.location=" index.php?pag=pag_meio&pagina=contato&tab=tabContato";		
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert("Não foi possivel excluir o registro.");
				window.location=" index.php?pag=pag_meio&pagina=contato&tab=tabContato";		
			</script>
			<?php
		}
	}
	if ($_GET['acao'] == "visualizar") {
		$id = $_GET['id'];
		$str = "SELECT * FROM contato WHERE idContato = $id";
		$requisicao = mysql_query($str);
		$campos = mysql_fetch_array($requisicao);
		if ($campos['confirmacao'] == "0") {
			$status = atualizar("contato","confirmacao='1',idUsuario=$idUsuario","idContato=$id");
			$requisicao = mysql_query($str);
			$campos = mysql_fetch_array($requisicao);
		}
	}	
 ?>
 <div class="formulario">
	<h2>Contato</h2>
	<p><strong>Nome :</strong><?php echo $campos['nome']; ?></p>
	<p><strong>E-mail :</strong><?php echo $campos['email']; ?></p>
	<p><strong>Enviada dia :</strong><?php echo date('d/m/y -- h:m:s', strtotime($campos['dataCadastro'])); ?></p>
	<p><strong>Mensagem: </strong><?php echo $campos['comentario']; ?></p>
	<p><strong>Primeira vez visualida por: </strong><?php echo $campos['idUsuario']; ?></p>
	<br><br><p><a href="index.php?pag=pag_meio&pagina=contato&tab=tabContato"><button name="voltar" class="botao"">VOLTAR</button></a></p>
</div>



