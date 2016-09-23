<div class="pagename">
    <?php
        $idCategoria = $_GET['idCategoria'];
        $str="select idCategoria, titulo from categoria where idCategoria=$idCategoria";
        $requisicao = mysql_query($str);
        $valor = mysql_fetch_array($requisicao);
        echo "<h1>$valor[titulo]";
    ?>
    <img src="img/setadownwhite.png"> </h1>
</div>
<div class="centralconteudo">
    <div class="menumid">
        <nav>
            <ul>
                <?php 
                    menuLateral();
                ?>
            </ul>           
        </nav>      
    </div>
    <div class="conteudo">
        <?php            
            if(isset($_GET['pag'])){
                /*include("pages/"."$_GET[pag]".".php");*/
                $idConteudo = $_GET['idConteudo'];
                $str = "select idConteudo, descricao from conteudo where idConteudo=$idConteudo";
                $requisicao = mysql_query($str);
                $valor = mysql_fetch_array($requisicao);
                echo "$valor[descricao]";
            }else{
                $idCategoria = $_GET['idCategoria'];
                $str="select idCategoria, descricao, titulo from categoria where idCategoria=$idCategoria";
                $requisicao = mysql_query($str);
                
                while($valor = mysql_fetch_array($requisicao)){
                    echo "<h5>$valor[titulo]</h5>";
                    echo "$valor[descricao]";
                }    
            }
         ?>     
    </div>
</div>