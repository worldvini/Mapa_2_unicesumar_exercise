<table class="tabela">
	<thead>
		<tr>
			<th>
				Categoria
			</th>
			<th>
				Ativo
			</th>
			<th>
				Data
			</th>
			<th>
				Ação
			</th>
		</tr>
	</thead>
	<tbody>		
		<?php 
			$str = "select * from categoria order by titulo asc";
			$requisicao = mysql_query($str);
			while($valor = mysql_fetch_array($requisicao)){
		?>
		<tr>
			<td>
				<?php 
					echo $valor['titulo'];
				?>
			</td>
			<td>
				<?php 
					if ($valor['ativo'] == 1) {
						echo "Sim";
					}else{
						echo "Não";
					}
				?>				
			</td>
			<td>
				<?php 
					echo date('d/m/y -- h:m:s', strtotime($valor['dataCadastro']));
				?>				
			</td>
			<td colspan=2>
				<?php
					echo "<a href=index.php?pag=pag_meio&pagina=categoria&form=formCategoria&acao=editar&id=". $valor['idCategoria'] .">Editar</a> &nbsp; &nbsp;";

					echo "<a href=index.php?pag=pag_meio&pagina=categoria&form=formCategoria&acao=excluir&id=". $valor['idCategoria'] .">Excluir</a>";
				?>				
			</td>
		</tr>		
		<?php		
			}
		?>
	</tbody>
</table>