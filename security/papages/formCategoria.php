<?php 
	//excluir algo da tabela verificando a ação requisitada
	if ($_GET['acao'] == "excluir") {
		$id = $_GET['id'];
		$status = excluir("categoria","idCategoria = $id");
		if ($status == "done") {
			?>
			<script type="text/javascript">
				alert("Registro excluido com sucesso.");
				window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria";		
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert("Não foi possivel excluir o registro.");
				//window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria";		
			</script>
			<?php
		}
	}
	//procura no banco de dados e faz o select caso o usuario tenha pedido para editar na acao
	if ($_GET['acao'] == "editar") {
		$id = $_GET['id'];
		$str = "SELECT * FROM categoria WHERE idCategoria = $id";
		$requisicao = mysql_query($str);
		$campos = mysql_fetch_array($requisicao);

		if (isset($_POST['editar'])){
			//verifica se alguma informação veio vazia
			if((empty($_POST['titulo'])) && (empty($_POST['descricao'])) && (empty($_POST['ativo']))){
           		?>
           			<script type="text/javascript">
           				alert("Os campos não podem estar em branco.");
						window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria";
           			</script>
           		<?php           		
        	}else{        		
				$titulo = trim($_POST['titulo']);
				$ativo = trim($_POST['ativo']);
				$descricao = trim($_POST['descricao']);
				$status = atualizar("categoria", "titulo='$titulo', descricao='$descricao', ativo='$ativo', dataCadastro=now()","idCategoria=$id");
				if ($status == "done") {
					?>
					<script type="text/javascript">
						alert("Registro alterado com sucesso.");
						window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria";
					</script>
					<?php
				}else{
					?>
					<script type="text/javascript">
						alert("Não foi possivel alterar o registro.");
						window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria";
					</script>
					<?php
				}
        	}
		}	
	}
	//cadastrar categoria nova
	if (isset($_POST['cadastrar'])) {
		//verifica se alguma informação veio vazia
			if((empty($_POST['titulo'])) && (empty($_POST['descricao'])) && (empty($_POST['ativo']))){
           		?>
           			<script type="text/javascript">
           				alert("Os campos não podem estar em branco.");
           			</script>
           		<?php           		
        	}else{
        		$titulo = trim($_POST['titulo']);
				$ativo = trim($_POST['ativo']);
				$descricao = trim($_POST['descricao']);
				$status = inserir("categoria", "titulo, descricao, dataCadastro, ativo, idUsuario", "'$titulo','$descricao', now() , '$ativo' , '$idUsuario' ");
				if ($status == "done") {
					?>
					<script type="text/javascript">
						alert("Usuario cadastrado com sucesso.");
						window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria";
					</script>
					<?php
					//header("location: index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria");
				}else{
					?>
					<script type="text/javascript">
						alert("Não foi possivel cadastrar o usuario.");	
						window.location="index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria";	
					</script>
					<?php
					//header("location: index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria");
				}
        	}
	}

 ?>

<div class="formulario">
	<?php 
		if ($_GET['acao'] == "editar") {
			echo "<h3>Editando Categoria</h3>";
		}else{
			echo "<h3>Cadastrando Nova Categoria</h3>";
		}
	 ?>
	<form action="" method="POST">
		 <label for ="titulo">Titulo Categoria:</label><br>
            <input id="titulo" type="text" name="titulo" value="<?php if(isset($campos['titulo'])){ echo $campos['titulo']; }?>" />
            <br />
            <br />
            <label for="descricao">Descrição:</label><br>
            <textarea id= "descricao" name="descricao"><?php if(isset($campos['descricao'])) {
            	echo $campos['descricao']; }  ?></textarea>
             <br />
            <label for="ativo">Ativo:</label><br>
            <select id="ativo" name="ativo">
                <option value="1" <?php if(isset($campos['ativo'])==1) {echo "selected";}?>>Sim</option>
                <option value="0" <?php if(isset($campos['ativo'])==0) {echo "selected";}?>>Não</option>
            </select><br />
            <?php
                if(!isset($campos['idCategoria'])){ 
            ?>
                <input type="submit" name="cadastrar" value="Cadastrar" />
            <?php 
        		}else{  
        	?>
                <input type="submit" name="editar" value="Editar" />   
            <?php 
            } 
            ?>
	</form>
</div>