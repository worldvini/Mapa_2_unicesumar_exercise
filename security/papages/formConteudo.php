<?php 
	//excluir algo da tabela verificando a ação requisitada
	if ($_GET['acao'] == "excluir") {
		$id = $_GET['id'];
		$status = excluir("conteudo","idConteudo = $id");
		if ($status == "done") {
			?>
			<script type="text/javascript">
				alert("Registro excluido com sucesso.");
				window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabConteudo";		
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
		$str = "SELECT * FROM conteudo WHERE idConteudo = $id";
		$requisicao = mysql_query($str);
		$campos = mysql_fetch_array($requisicao);
		if (isset($_POST['editar'])){
			//verifica se alguma informação veio vazia
			if((empty($_POST['titulo'])) && (empty($_POST['descricao'])) && (empty($_POST['ativo']))){
           		?>
           			<script type="text/javascript">
           				alert("Os campos não podem estar em branco.");
						window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabConteudo";
           			</script>
           		<?php           		
        	}else{
				$titulo = trim($_POST['titulo']);
				$ativo = trim($_POST['ativo']);
				$descricao = trim($_POST['descricao']);
				$idCategoria = $campos['idCategoria'];
				$status = atualizar("conteudo", "titulo='$titulo',descricao='$descricao', ativo='$ativo', idCategoria='$idCategoria'", "idConteudo='$id'");
				if ($status == "done") {
					?>
					<script type="text/javascript">
						alert("Registro alterado com sucesso.");
						window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabConteudo";
					</script>
					<?php
				}else{
					?>
					<script type="text/javascript">
						alert("Não foi possivel alterar o registro.");
						window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabConteudo";
					</script>
					<?php
				}
        	}
		}	
	}
	//cadastrar categoria nova
	if (isset($_POST['cadastrar'])) {
		//verifica se alguma informação veio vazia
			if((empty($_POST['titulo'])) && (empty($_POST['descricao'])) && (empty($_POST['ativo'])) && (empty($_POST['idCategoria']))){
           		?>
           			<script type="text/javascript">
           				alert("Os campos não podem estar em branco.");
           			</script>
           		<?php           		
        	}else{
        		$titulo = trim($_POST['titulo']);
				$ativo = trim($_POST['ativo']);
				$descricao = trim($_POST['descricao']);
				$idCategoria = trim($_POST['idCategoria']);
				$status = inserir("conteudo", "titulo, descricao, dataCadastro, ativo, idUsuario, idCategoria", "'$titulo','$descricao', now() , '$ativo' , '$idUsuario', '$idCategoria' ");
				if ($status == "done") {
					?>
					<script type="text/javascript">
						alert("Usuario cadastrado com sucesso.");
						window.location=" index.php?pag=pag_meio&pagina=categoria&tab=tabConteudo";
					</script>
					<?php
					//header("location: index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria");
				}else{
					?>
					<script type="text/javascript">
						alert("Não foi possivel cadastrar o usuario.");	
						window.location="index.php?pag=pag_meio&pagina=categoria&tab=tabConteudo";	
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
			echo "<h3>Editando Conteudo</h3>";
		}else{
			echo "<h3>Cadastrando Novo Conteudo</h3>";
		}
	 ?>
	<form action="" method="POST">
		 <label for ="titulo">Titulo Conteudo:</label><br>
            <input id="titulo" type="text" name="titulo" value="<?php if(isset($campos['titulo'])){ echo $campos['titulo']; }?>" />
            <br />
            <br />
            <!--foi necessário criar um novo loop de banco, para buscar todas as categorias existentes para catalogar o conteudo -->
            <label for="categoria">Categoria</label>
            <select name="idCategoria" id="categoria">            	
	            <?php 
	            	if (isset($campos['idCategoria'])) {
	            		$idCategoria = $campos['idCategoria'];
	            	}
	            	$str2 = "SELECT * FROM categoria";
	            	$requisicao2 = mysql_query($str2);
	            	while($campos2 = mysql_fetch_array($requisicao2)){
	            		if ($campos2['idCategoria'] == $idCategoria) {
	            			?>
	            			<option value="<?php echo $campos2['idCategoria']; ?> selected='selected'> <?php echo $campo2['titulo']; ?></option>
	            		<?php	
	            		}else{
	            			?>
	            			<option value="<?php echo $campos2['idCategoria'];?>"><?php echo $campos2['titulo']; ?></option>
                        <?php
	            		}
	            	}
	             ?>
            </select>
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
                if(!isset($campos['idConteudo'])){ 
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