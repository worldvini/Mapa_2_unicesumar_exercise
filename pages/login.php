<!-- verificando se o usuario digitou algo, por isso coloquei o botão foda do form chamando a função
java script, e caso ele senha digitado algo nos dois campos então eu submito as informações a próxima pagina -->
<script type="text/javascript">	
	function validar(){
		var login = document.formlogin.login.value;
		var senha = document.formlogin.senha.value;
		if(login == ''){
			alert('Login em branco, por favor preencha o seu login');
			document.formlogin.login.focus();
			return false;
		}else{
			if (senha == '') {
				alert('Senha em branco, por favor preecha o sua senha');
				document.formlogin.senha.focus();
				return false;
			}else{
				document.formlogin.submit();
			}
		}		
	}
</script> 

<div class="pagename">
	<h1>Login sistema <img src="img/setadownwhite.png"> </h1>
</div>
<div class="formulario">
	<h4>Área restrita para manutenção</h4>
	<p>Acesso apenas a funcionários do sistema</p>
	<form action="security/validacao.php" method="POST" name="formlogin">
		<p><input type="text" placeholder="***INSIRA AQUI SEU LOGIN***" name="login"></p>
		<p><input type="password" placeholder="***INSIRA AQUI SUA SENHA***" name="senha"></p>		
	</form>
		<p><button name="enviar" class="botao" onclick="validar()">Clique para logar</button></p>
</div>