<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="../assets/css/cad-padrao.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Relatório</title>
  </head>
  <body>
    <header>
      <a href="index.html">Voltar</a>
      <ul>
        <li><a href="login.html">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
      <form class="card">
        <h1>RELATÓRIO</h1>
        <div class="input-text">
          <label for="data-inicio">Data Inicio:</label>
          <input type="date" name="dataInicio" value="<?php if(isset($_GET['dataInicio'])) echo $_GET['dataInicio']; ?>">
        </div>
        <div class="input-text">
          <label for="data-final">Data final:</label>
          <input type="date" name="dataFinal" value="<?php if(isset($_GET['dataFinal'])) echo $_GET['dataFinal']; ?>">
        </div>
        <input type="submit" value="EMITIR RELATÓRIO" />
      </form>
    </div>
  </body>
</html>