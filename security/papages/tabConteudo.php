<table class="tabela">
	<thead>
		<tr>
			<th>
				Conteudo
			</th>
			<th>
				Categoria
			</th>
			<th>
				Descrição
			</th>
			<th>
				Ativo
			</th>
			<th>
				Data
			</th>
			<th>
				Acão
			</th>
		</tr>
	</thead>
	<tbody>		
		<?php 
			$str = "select * from conteudo";
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
					$fastcategoria = mysql_query("SELECT * from categoria where idcategoria=$valor[idCategoria]");
					while($valor2 = mysql_fetch_array($fastcategoria)){
						echo $valor2['titulo'];
					}
				?>				
			</td>
			<td>
				<?php
					echo "".substr($valor['descricao'], 0, 100)."...";
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
					echo "<a href=index.php?pag=pag_meio&pagina=conteudo&form=formConteudo&acao=editar&id=". $valor['idConteudo'] .">Editar</a> &nbsp; &nbsp;";

					echo "<a href=index.php?pag=pag_meio&pagina=conteudo&form=formConteudo&acao=excluir&id=". $valor['idConteudo'] .">Excluir</a>";
				?>				
			</td>
		</tr>		
		<?php		
			}
		?>
	</tbody>
</table>