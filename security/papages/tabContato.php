<table class="tabela">
	<thead>
		<tr>
			<th>
				Nome
			</th>
			<th>
				Email
			</th>
			<th>
				Comentário
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
			$str = "select * from contato";
			$requisicao = mysql_query($str);
			while($valor = mysql_fetch_array($requisicao)){
		?>
		<tr>
			<td>
				<?php 
					echo $valor['nome'];
				?>
			</td>
			<td>
				<?php 
					echo $valor['email'];
				?>				
			</td>
			<td>
				<?php
					echo "".substr($valor['comentario'], 0, 100)."...";
				?>
			</td>
			<td>
				<?php 
					echo date('d/m/y -- h:m:s', strtotime($valor['dataCadastro']));
				?>				
			</td>
			<td colspan=2>
				<?php
					echo "<a href=index.php?pag=pag_meio&pagina=categoria&form=formContato&id=". $valor['idContato'] .">Editar</a> &nbsp; &nbsp;";

					echo "<a href=index.php?pag=pag_meio&pagina=categoria&form=ExcluirContato&id=". $valor['idContato'] .">Excluir</a>";
				?>				
			</td>
		</tr>		
		<?php		
			}
		?>
	</tbody>
</table>