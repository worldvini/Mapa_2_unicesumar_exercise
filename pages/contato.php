<?php 
	include ("conexao.php");
	include ("banco/banco.php");
	if (isset($_POST['nome'])) {
		if((empty($_POST['nome'])) &&  (empty($_POST['email'])) && (empty($_POST['comentario'])) ){
			?>
       			<script type="text/javascript">
       				alert("Os campos não podem ter só ESPAÇOS ou CARACTERES ESPECIAIS");
					window.location="index.php?pagina=contato";
       			</script>
           	<?php
		}else{	
			$nome = trim($_POST['nome']);
			$email = trim($_POST['email']);
			$recado = trim($_POST['recado']);
			$status = inserir("contato","nome, email, comentario, dataContato, confirmacao","'$nome', '$email', '$recado', now(), '0'");
			if ($status == "done") {
						?>
						<script type="text/javascript">
							alert("Seu contato foi enviado, responderemos em breve.");
							window.location="index.php?pagina=contato";
						</script>
						<?php
					}else{
						?>
						<script type="text/javascript">
							alert("Não foi possivel enviar seu contato.");	
							window.location="index.php?pagina=contato";	
						</script>
						<?php
					}
		}		
	}
 ?>
 <script type="text/javascript">	
	function validar(){
		var nome = document.formcontato.nome.value;
		var email = document.formcontato.email.value;
		var recado = document.formcontato.recado.value;
		if(nome == ''){
			alert('Nome em branco, por favor preencha o seu Nome.');
			document.formcontato.nome.focus();
			return false;
		}else{
			if (email == '') {
				alert('Email em branco, por favor preecha o sua Email.');
				document.formcontato.email.focus();
				return false;
			}else{
				if (recado == '') {
					alert('Campo recado em branco, por favor deixe seu recado.');
					document.formcontato.recado.focus();
					return false;
				}else{
				document.formcontato.submit();
				}
			}
		}		
	}
</script> 

<div class="pagename">
	<h1>Contato <img src="img/setadownwhite.png"></h1>
</div>
<div class="formulario">
	<h4>Deixe seu Recado</h4>
	<p>Necessário Preencher todos os campos</p>
	<form action="" method="POST" name="formcontato">
		<p><input type="text" placeholder="NOME" name="nome"></p>
		<p><input type="text" placeholder="E-MAIL" name="email"></p>
		<p><textarea placeholder="Deixe seu recado..." name="recado"></textarea></p>
	</form>
	<p><button name="enviar" class="botao" onclick="validar()">Enviar Contato</button></p>

</div>