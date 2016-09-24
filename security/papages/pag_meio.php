<div class="pagename">
	<h1><?php echo $_GET['pagina']; ?> <img src="../img/setadownwhite.png"> </h1>
</div>
<div class="centralconteudo">
	<div class="menumid pa">
		<nav>
			<ul>
				<li>
					<?php 
						if (isset($_GET['pagina'])) {
							$pagina = $_GET['pagina'];
							switch ($pagina) {
								case 'categoria':
									echo "<a href=index.php?pag=pag_meio&pagina=categoria&form=formCategoria>Inserir Nova Categoria</a>";
									break;
								case 'conteudo':
									echo "<a href=index.php?pag=pag_meio&pagina=conteudo&form=formConteudo>Inserir Novo Conteudo</a>";
									break;
								case 'usuario':
									echo "<a href=index.php?pag=pag_meio&pagina=usuario&form=formUsuario>Inserir Novo Usuario</a>";
									break;
								case 'contato':
									echo "<a href=index.php?pag=pag_meio&pagina=contato&form=formContato>Verificar Contato</a>";
									break;								
								default:
									header("location: index.php");
									break;
							}
						}
			 		?>
				</li>				
			</ul>			
		</nav>		
	</div>
	<div class="conteudo patabela">
		<?php 
			if(isset($_GET['form'])){
				include("papages/"."$_GET[form]".".php");
			}else{
				if (isset($_GET['tab'])) {
					include("papages/"."$_GET[tab]".".php");
				}else{
					include("index.php");
				}				
			}
		 ?>		
	</div>
</div>