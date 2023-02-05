<?php

//conexao
include_once '../livro/php.action/connect-bd.php';
//Select
if(isset($_GET['idLivro'])):
    $idLivro = mysqli_escape_string($connect, $_GET['idLivro']);

    $sql = "SELECT * FROM livro WHERE idLivro = '$idLivro'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);

endif;

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="../assets/css/cad-padrao.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Cadastrar Livro</title>
</head>
    <body>
    <header>
      <a href="../livro/">Voltar</a>
      <ul>
        <li><a href="login.html">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
      <form class="card" action="../livro/php.action/update-livro.php" method="POST">
        <h1>EDITAR LIVROS</h1>
        <div class="input-text">
        <input type= "hidden" name= "idLivro" value="<?php echo $dados['idLivro'];?>">
          <label for="Titulo">Titulo:</label>
          <input type="text" name="titulo" id="titulo" value="<?php echo $dados['titulo'];?>">
        </div>
        <div class="input-text">
          <label for="preco">Preço:</label>
          <input type="number" name="preco" id="preco" value="<?php echo $dados['preco'];?>">
        </div>
        <div class="input-text">
          <label for="anoPublicacao">Ano de Publicação:</label>
          <input type="date" name="anoPublicacao" id="anoPublicacao" value="<?php echo $dados['anoPublicacao'];?>">
        </div>
        <div class="input-text">
          <label for="edicao">Edição:</label>
          <input type="number" name="edicao" id="edicao" value="<?php echo $dados['edicao'];?>">
        </div>
        <div class="input-text">
          <label for="genero">Gênero:</label>
          <input type="text" name="genero" id="genero" value="<?php echo $dados['genero'];?>">
        </div>
        <div class="input-text">
        <select  id="idAutor" name="idAutor" value="<?php echo $dados['idAutor'];?>">
                <option value="text" disabled selected>Escolha o Autor</option>
                <?php
                    $sql="SELECT idAutor,idAutor, nomeAutor, nacionalidade
                    from autor";

                    $result=mysqli_query($connect,$sql);

                    while ($autor=mysqli_fetch_row($result)):
                        ?>
                        <option value="<?php echo $autor[0] ?>"><?php echo $autor[1]." - ".$autor[2]." - ".$autor[3] ?></option>
                    <?php endwhile; ?>
        </select>
        </div>
        <div class="input-text">
        <select  id="idEditora" name="idEditora" value="<?php echo $dados['idEditora'];?>">
                <option value="text">Escolha a Editora</option>
                <?php
                    $sql="SELECT idEditora,idEditora, nomeEditora,cidade
                    from editora";

                    $result=mysqli_query($connect,$sql);

                    while ($editora=mysqli_fetch_row($result)):
                        ?>
                        <option value="<?php echo $editora[0] ?>"><?php echo $editora[1]." - ".$editora[2]." - ".$editora[3] ?></option>
                    <?php endwhile; ?>
        </select>
        </div>
        <input type="submit" name="btn-editar" value="EDITAR"/>
        <a href="index.php" type="submit">LISTAR</a>
      </form>
    </div>
  </body>
</html> 