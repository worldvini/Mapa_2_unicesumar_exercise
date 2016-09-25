<?php 
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	session_start();
	include("autentica.php");
	include("../conexao.php");
	include("../banco/banco.php");
	//teste se a variavel está funcionando
	$nome = $_SESSION["nome"];
	$idUsuario = $_SESSION["idUsuario"];
	///echo "ate e enfim heim  $nome";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Painel de Controle</title>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
 <body>
	 <div class="container">
	 	<header>
	 		<div class="menutop">
				<nav>
					<ul>
						<li>
							<a href="index.php?pag=pag_meio&pagina=categoria&tab=tabCategoria">Categoria</a>
						</li>
						<li>
							<a href="index.php?pag=pag_meio&pagina=conteudo&tab=tabConteudo">Conteudo</a>
						</li>
						<li>
							<a href="index.php?pag=pag_meio&pagina=usuario&tab=tabUsuario">Usuario</a>
						</li>
						<li>
							<a href="index.php?pag=pag_meio&pagina=contato&tab=tabContato">Contato</a>
						</li>
						<li>
							<a href="index.php?pag=senha">Trocar Senha</a>
						</li>
						<li>
							<a href="index.php?pag=logout">Sair</a>
						</li>
					</ul>
				</nav>		
			</div>		
	 	</header>
	 	<section>
	 		<div class="banner">
				<img src="../img/bannerpa.png">
			</div>
			<div>
			<?php 
				if(isset($_GET['pag'])){
					include ("papages/". "$_GET[pag]" . ".php");
				}else{
					include("papages/pa.php");
				} /* Caso tenha algo na variavel GET, chame a pagina com esse nome, caso não tenha, chame a pagina home */
			 ?>
		</div>
	 	</section>
	 	<footer>
	 		<div class="row">
	 			<?php 
					echo "<p>Seja bem vindo $nome. </p>";
				 ?>
	 		</div>
	 	</footer>
	 </div>
 </body>
 </html>