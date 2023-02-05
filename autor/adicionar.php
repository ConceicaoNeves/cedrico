<?php
//Header
include_once 'includes/header.php';
include_once 'includes/message.php';
?> 

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="assets/css/cad-padrao.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Cadastrar Autor</title>
  </head>
  <body>
    <header>
      <a href="cadastro.html">Voltar</a>
      <ul>
        <li><a href="login.html">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
      <form class="card" action="php_action/create.php" method="POST">
        <h1>CADASTRAR AUTOR</h1>
        <div class="input-text">
          <label for="nome">Nome:</label>
          <input type="text" name="nomeAutor" id="nomeAutor">
        </div>
        <div class="input-text">
          <label for="nome-art">Sobrenome:</label>
          <input type="text" name="sobrenomeAutor" id="sobrenomeAutor">
        </div>
        <div class="input-text">
          <label for="data-nascimento">Data Nascimento:</label>
          <input type="date" name="dataNascimento" id="dataNascimento" />
        </div>
        <div class="input-text">
          <label for="data-nascimento">Data Falecimento:</label>
          <input type="date" name="dataMorte" id="dataMorte" />
        </div>
        <input type="submit" value="CADASTRAR" />
      </form>
    </div>
  </body>
</html>

            <div class="input-field col s12">
                <i class="material-icons prefix">calendar_month</i>
                <input id="icon_prefix" class="validate" type="date" name="dataMorte" id="dataMorte">
                <label for="dataMorte">Data de Falecimento</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate" type="text" name="nacionalidade" id="nacionalidade">
                <label for="nacionalidade">Nacionalidade</label>
            </div>
            <button type="submit" name="btn-cadastrar" class="btn deep-purple lighten-2"><i class="material-icons left">add_circle_outline</i>Cadastrar</button>
            <a href="index.php" class="btn"><i class="material-icons left">list</i>Lista de Autores</a>
            <br>
                <button class="btn-floating btn-small waves-effect waves-light red darken-1" 
                style="width: 50px; height: 50px; right: -95%; buttom: 0%"
                title="Sair" aria-pressed="false"> 
                <a href="../logout.php" class ="" ><i class="material-icons">exit_to_app</i></a>
                </button>
                <br> 
        </form>
    </div>
    </div>
</div>
<?php
//Footer
include_once 'includes/footer.php';
?>