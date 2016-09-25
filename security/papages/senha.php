<?php 
$str = "SELECT * FROM usuario WHERE idUsuario = $idUsuario";
$requisicao = mysql_query($str);
$info = mysql_fetch_array($requisicao);

if(isset($_POST['oldsenha'])) {
	$oldsenha = trim($_POST['oldsenha']);
	$oldsenha = md5($oldsenha);
	if ($oldsenha == $info['senhaUsuario']){
		$senha = trim($_POST['senha']);
		$confsenha = trim($_POST['confsenha']);
		if ($senha == $confsenha) {
			$senha = md5($senha);
			$status = atualizar("usuario","senhaUsuario='$senha'","idUsuario = $idUsuario");
			if ($status == "done") {
				?>
				<script type="text/javascript">
					alert("Senha alterada com sucesso.");
					window.location=" index.php?pag=senha";		
				</script>
				<?php
			}else{
				?>
				<script type="text/javascript">
					alert("Não foi possivel alterar a senha.");
					window.location=" index.php?pag=senha";		
				</script>
				<?php
			}
		}else{
			?>
			<script type="text/javascript">
				alert("Sua nova senha e confirmacao de senha não são iguais.");
				window.location=" index.php?pag=senha";		
			</script>
			<?php
		}
	}else{
		?>
			<script type="text/javascript">
				alert("Sua senha atual não está correta.");
				window.location=" index.php?pag=senha";		
			</script>
		<?php
	}
}
?>
<script type="text/javascript">	
	function validar(){
		var oldsenha = document.alterarSenha.oldsenha.value;
		var senha = document.alterarSenha.senha.value;
		if(oldsenha == ''){
			alert('Campo antiga senha, por favor preencha o seu login');
			document.alterarSenha.oldsenha.focus();
			return false;
		}else{
			if (senha == '') {
				alert('Senha em branco, por favor preecha o sua senha');
				document.alterarSenha.confsenha.focus();
				return false;
			}else{
				document.alterarSenha.submit();
			}
		}			
	}
</script> 

<div class="pagename">
	<h1>Alterando Senha <img src="../img/setadownwhite.png"> </h1>
</div>
<div class="formulario">
	<h4>Alterar Senha</h4>
	<p>*Todos os campos são obrigatórios</p>
	<form action="index.php?pag=senha&acao=1" method="POST" name="alterarSenha">
		<p>Senha Atual: <br> <input type="text" placeholder="***digite sua senha atual***" name="oldsenha"></p>
		<p>Nova Senha :<br><input type="text" placeholder="***digite sua nova senha***" name="senha"></p>
		<p>Confirme Nonha Senha:<br><input type="password" placeholder="***digite sua nova senha novamente***" name="confsenha"></p>		
	</form>
		<p><button name="enviar" class="botao" onclick="validar()">Alterar Senha</button></p>
</div>