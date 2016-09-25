<?php 
	//excluir algo da tabela verificando a ação requisitada
	if ($_GET['acao'] == "excluir") {
		$id = $_GET['id'];
		$status = excluir("usuario","idUsuario = $id");
		if ($status == "done") {
			?>
			<script type="text/javascript">
				alert("Registro excluido com sucesso.");
				window.location=" index.php?pag=pag_meio&pagina=usuario&tab=tabUsuario";		
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
		$str = "SELECT * FROM usuario WHERE idUsuario = $id";
		$requisicao = mysql_query($str);
		$campos = mysql_fetch_array($requisicao);

		if (isset($_POST['editar'])){
			//verifica se alguma informação veio vazia
			if((empty($_POST['nome'])) && (empty($_POST['ativo']))){
           		?>
           			<script type="text/javascript">
           				alert("Os campos não podem estar em branco.");
						window.location=" index.php?pag=pag_meio&pagina=usuario&tab=tabUsuario";
           			</script>
           		<?php           		
        	}else{   
        		$nome = trim($_POST['nome']);
				$ativo = trim($_POST['ativo']);
				$status = atualizar("usuario", "nomeUsuario='$nome', ativo='$ativo'", "idUsuario=$id");
				if ($status == "done") {
					?>
					<script type="text/javascript">
						alert("Registro alterado com sucesso.");
						window.location=" index.php?pag=pag_meio&pagina=usuario&tab=tabUsuario";
					</script>
					<?php
				}else{
					?>
					<script type="text/javascript">
						alert("Não foi possivel alterar o registro.");
						window.location=" index.php?pag=pag_meio&pagina=usuario&tab=tabUsuario";
					</script>
					<?php
				}
        	}
		}	
	}
	//cadastrar categoria nova
	if (isset($_POST['cadastrar'])) {
		//verifica se alguma informação veio vazia
			if((empty($_POST['nome'])) && (empty($_POST['login'])) && (empty($_POST['ativo'])) && (empty($_POST['senha'])) && (empty($_POST['confsenha'])) ){
           		?>
           			<script type="text/javascript">
           				alert("Os campos não podem estar em branco.");
           			</script>
           		<?php           		
        	}else{
        		$nome = trim($_POST['nome']);
				$login = trim($_POST['login']);
				$senha = trim($_POST['senha']);
				$confsenha = trim($_POST['confsenha']);
				$ativo = trim($_POST['ativo']);

				if ($senha == $confsenha) {
					$senha = md5($senha);
					$status = inserir("usuario", "nomeUsuario, loginUsuario, senhaUsuario, dataCadastro, ativo", "'$nome', '$login', '$senha', now() , '$ativo' ");
					if ($status == "done") {
						?>
						<script type="text/javascript">
							alert("Usuario cadastrado com sucesso.");
							window.location=" index.php?pag=pag_meio&pagina=usuario&tab=tabUsuario";
						</script>
						<?php
						//header("location: index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria");
					}else{
						?>
						<script type="text/javascript">
							alert("Não foi possivel cadastrar o usuario.");	
							window.location="index.php?pag=pag_meio&pagina=usuario&tab=tabUsuario";	
						</script>
						<?php
						//header("location: index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria");
					}
				}
        	}
	}

 ?>

<div class="formulario">
	<?php 
		if ($_GET['acao'] == "editar") {
			echo "<h3>Editando Usuário</h3>";
		}else{
			echo "<h3>Cadastrando Nova Usuário</h3>";
		}
	 ?>
	<form action="" method="POST">
		 <label for ="nome">Nome:</label><br>
            <input id="nome" type="text" name="nome" value="<?php if(isset($campos['nomeUsuario'])){ echo $campos['nomeUsuario']; }?>" />
            <br>
            <?php 
             	// caso seja um cadastro de usuario, mostra o campo (login,senha e confirmacao de senha) do contrario não mostra
                if(!isset($campos['idUsuario'])){ 
		            ?>
		            <label for="login">Login:</label><br>
		            <textarea id= "login" name="login"><?php if(isset($campos['login'])) {
		            	echo $campos['login']; }  ?></textarea><br>             
		            <label for="senha">Senha:</label><br>
		            <input type="password" id= "senha" name="senha"><br>
		            <label for="confsenha">Digine novamente sua Senha:</label><br>
		            <input type="password" id= "confsenha" name="confsenha"><br>
		            <?php
		            }
		            ?>
            <label for="ativo">Ativo:</label><br>
            <select id="ativo" name="ativo">
                <option value="1" <?php if(isset($campos['ativo'])==1) {echo "selected";}?>>Sim</option>
                <option value="0" <?php if(isset($campos['ativo'])==0) {echo "selected";}?>>Não</option>
            </select><br>
            <?php
                if(!isset($campos['idUsuario'])){ 
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