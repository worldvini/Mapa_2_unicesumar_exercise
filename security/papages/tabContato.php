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
				Recebido
			</th>
			<th>
				Status
			</th>
			<th>
				Abrir
			</th colspan="2">
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
					echo date('d/m/y -- h:m:s', strtotime($valor['dataContato']));
				?>				
			</td>
			<td>
				<?php
					if ($valor['confirmacao'] == "0") {
						echo "Novo";
					}else{
						echo "Lido";
					}
				?>
			</td>
			<td>
				<?php
					echo "<a href=index.php?pag=pag_meio&pagina=contato&form=formContato&acao=visualizar&id=". $valor['idContato'] .">Visualizar</a> &nbsp; &nbsp;";
					//A opção excluir Msg de contato só aparece se alguém já tiver visualizado a mensagem no minimo 1 vez.
					if ($valor['confirmacao'] == "1") {
						echo "<a href=index.php?pag=pag_meio&pagina=contato&form=formContato&acao=excluir&id=". $valor['idContato'] .">Excluir</a>";
					}					
				?>				
			</td>
		</tr>		
		<?php		
			}
		?>
	</tbody>
</table>