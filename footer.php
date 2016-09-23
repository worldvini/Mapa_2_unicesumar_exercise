	<footer>
		<div class="row">
			<?php 
				$str = "select idCategoria, titulo from categoria";
				$requisicao = mysql_query($str);
				while($valor = mysql_fetch_array($requisicao)){
			 ?>	
			<div class="col-ms-3">
				<h5><?php echo $valor['titulo'] ?><br><img src="img/setadownwhite.png"></h5>
				<ul>
					<?php 
						menuRodape($valor['idCategoria']);
					 ?>
				</ul>							
			</div>	
			<?php 
				}
			 ?>							
		</div>		
	</footer>
</div>	

</body>
</html>