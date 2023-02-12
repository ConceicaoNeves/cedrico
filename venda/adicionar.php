<?php
//Header
include "../venda/php_action/connect.php";
include 'includes/message.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="../assets/css/cad-padrao.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Cadastrar Venda</title>
  </head>
  <body>
    <header>
      <a href="#modal">Voltar</a>
      <ul>
        <li><a href="login.html">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
    <div id="modal" class="modal">
                    <div class="modal-content">
                    <h5>Tem certeza que não deseja finalizar essa venda?</h5>
                    <p>A operação não poderá ser desfeita.</p>
                    </div>
                    <div class="modal-footer">
                                
                    <form action="../venda/vendas.html" method="POST">
                        <button type="submit" name="btn" class="btn green lighten-1">Sim, tenho certeza!</button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </form>
                    </div>
        </div>
      <form class="card" action="../venda/php_action/creat.php" method="POST">
        <h1>CADASTRAR VENDA</h1>
        <div class="input-text">
          <label for="idLivro">Livro:</label>
          <select  id="idLivro" name="idLivro">
            <option value="text" disabled selected>Escolha o Livro</option>
            <?php
				$sql="SELECT idLivro, idLivro, titulo, preco
				from livro";

				$result=mysqli_query($connect,$sql);

				while ($livro=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $livro[0] ?>"><?php echo $livro[1]." - ".$livro[2]." - ".$livro[3].",00" ?></option>
                    <?php  endwhile; 
                    ?>
                
            </select>
        </div>
        <div class="input-text">
          <label for="preco">Preço:</label>
          <select  id="preco" name="preco">
            <option value="text">Preço</option>
            <?php
				$sql="SELECT preco,idLivro,titulo
				from livro";

				$result=mysqli_query($connect,$sql);

				while ($valor=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $valor[0] ?>"><?php echo $valor[1]." - ".$valor[2] ." - ".$valor[0].",00"?></option>
                    <?php  endwhile; ?>
                
            </select>
        <div class="input-text">
          <label for="dataVenda">Data:</label>
          <input class="validate" type="date" name="dataVenda" id="dataVenda">
        </div>
        <div class="input-text">
          <label for="editora">Cpf Comprador:</label>
          <input type="text" name="cpfComprador" id="cpfComprador">
        </div>
        <input type="submit" name="btn-registrarnovavenda" value="CADASTRAR" />
      </form>
    </div>
  </body>
</html>
