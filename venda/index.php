<?php
//Header
include_once 'php_action/connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';
?> 
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="../assets/css/cad-padrao.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Livro</title>
</head>
    <body>
    <header>
      <a href="vendas.html">Voltar</a>
      <ul>
        <li><a href="login.html">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
        <form class="card-list">
        <h4>Vendas</h4>
        <table class ="striped">
        
            <thread>
                <tr>
                    <th>idVenda</th>
                    <th>Livro</th>
                    <th>Valor Unitário</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Data</th>  
                </tr>
            </thread>
            <tbody>
                <?php
                $sql = "SELECT * FROM venda";
                $resultado = mysqli_query($connect, $sql);
                
                if(mysqli_num_rows($resultado)>0):
                    while($dados = mysqli_fetch_array($resultado)):
                        $dados['dataVenda'] = strtotime($dados['dataVenda'])
                    ?>
                    <tr>
                        <td><?php echo $dados["idVenda"]; ?></td>
                        <td><?php echo $dados["idLivro"]; ?></td>
                        <td><?php echo $dados["preco"]; ?></td>
                        <td><?php echo $dados["quantidade"]; ?></td>
                        <td><?php echo $dados["total"]; ?></td>
                        <td><?php echo date('d/m/Y', $dados['dataVenda']); ?></td>
                    </tr>
                    <?php 
                    endwhile;
                else: ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php 
                endif;
                ?>
                </tbody>
                </table>
                <a type="submit" href="adicionar.php">NOVA VENDA</a>
           </form>>
        </div> 
    </body>
</html>