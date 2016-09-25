<table class="tabela">
	<thead>
		<tr>
			<th>
				Nome
			</th>
			<th>
				Login
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
			$str = "select * from usuario order by nomeUsuario asc";
			$requisicao = mysql_query($str);
			while($valor = mysql_fetch_array($requisicao)){
		?>
		<tr>
			<td>
				<?php 
					echo $valor['nomeUsuario'];
				?>
			</td>
			<td>
				<?php
					echo $valor['loginUsuario'];
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
					echo "<a href=index.php?pag=pag_meio&pagina=usuario&form=formUsuario&acao=editar&id=". $valor['idUsuario'] .">Editar</a> &nbsp; &nbsp;";
					//você não pode excluir o seu próprio usuario
					if ($valor['nomeUsuario'] != $nome) {
						echo "<a href=index.php?pag=pag_meio&pagina=usuario&form=formUsuario&acao=excluir&id=". $valor['idUsuario'] .">Excluir</a>";
					}					
				?>				
			</td>
		</tr>		
		<?php		
			}
		?>
	</tbody>
</table>