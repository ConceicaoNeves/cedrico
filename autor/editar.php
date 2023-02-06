<?php
//Header
include_once 'php_action/bdconnect.php';
if (isset($_GET['idAutor'])):
    $idAutor = mysqli_escape_string($connect, $_GET['idAutor']);
    $sql = "SELECT * FROM autor WHERE idAutor ='$idAutor'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?> 

<?php
//Header
include_once 'includes/message.php';
?> 
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="../assets/css/cad-padrao.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Cadastrar Autor</title>
  </head>
  <body>
    <header>
      <a href="../autor/index.php">Voltar</a>
      <ul>
        <li><a href="login.html">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
      <form class="card" aaction="php_action/update.php" method="POST">
        <h1>EDITAR AUTOR</h1>
        <div class="input-text">
        <input type= "hidden" name = "idAutor" value="<?php echo $dados['idAutor'];?>">
          <label for="nome">Nome:</label>
          <input class="validate" type="text" name="nomeAutor" id="nomeAutor" value="<?php echo $dados['nomeAutor'];?>">
        </div>
        <div class="input-text">
          <label for="sobrenome">Sobrenome:</label>
          <input class="validate" type="text" name="sobrenomeAutor" id="sobrenomeAutor" value="<?php echo $dados['sobrenomeAutor'];?>">
        </div>
        <div class="input-text">
          <label for="dataNascimento">Data nascimento:</label>
          <input class="validate" type="date" name="dataNascimento" id="dataNascimento" value="<?php echo $dados['dataNascimento'];?>">
        </div>
        <div class="input-text">
          <label for="dataMorte">Data de Falecimento:</label>
          <input class="validate" type="date" name="dataMorte" id="dataMorte" value="<?php echo $dados['dataMorte'];?>">
        </div>
        <div class="input-text">
          <label for="nacionalidade">Nacionalidade:</label>
          <input class="validate" type="text" name="nacionalidade" id="nacionalidade" value="<?php echo $dados['nacionalidade'];?>">
        </div>
        <input name="btn-editar" type="submit" value="CADASTRAR" />
      </form>
    </div>
  </body>
</html>