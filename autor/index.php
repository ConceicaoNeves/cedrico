<?php
include_once 'php_action/bdconnect.php';
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
      <a href="../cadastro.html">Voltar</a>
      <ul>
        <li><a href="login.html">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
        <form class="card-list">
        <h4 class ="light">Autores</h4>
        <table class ="striped">
        <table>
            <thread>
                <tr>
                    <th>Identificador</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Nascimento</th>
                    <th>Morte</th>
                    <th>Nacionalidade</th>
                </tr>
            </thread>
            <tbody>
                <?php
                $sql = "SELECT * FROM autor";
                $resultado = mysqli_query($connect, $sql);
                if(mysqli_num_rows($resultado)>0):
                    while($dados = mysqli_fetch_array($resultado)):
                        $dados['dataNascimento'] = strtotime($dados['dataNascimento']);
                        $dados['dataMorte'] = strtotime($dados['dataMorte'])
                    ?>
                    
                    <tr>
                        <td><?php echo $dados['idAutor']; ?></td>
                        <td><?php echo $dados['nomeAutor']; ?></td>
                        <td><?php echo $dados['sobrenomeAutor']; ?></td>
                        <td><?php echo date('d/m/Y', $dados['dataNascimento']);?></td>
                        <td><?php echo date('d/m/Y', $dados['dataMorte']);?></td>
                        <td><?php echo $dados['nacionalidade']; ?></td>
                        <td><a href="editar.php?idAutor=<?php echo $dados['idAutor']; ?>" class ="btn-floating light-green"><i class ="material-icons">edit</i></a></td>
                        
                        <td><a href="#modal<?php echo $dados['idAutor']; ?>" class ="btn-floating red lighten-1 modal-trigger"><i class ="material-icons">delete</i></a></td>
                    
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['idAutor']; ?>" class="modal">
                            <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja excluir esse autor?</p>
                            </div>
                            <div class="modal-footer">
                            
                            <form action="php_action/delete.php" method="POST">
                                <input type="hidden" name="idAutor" value="<?php echo $dados['idAutor']; ?>">
                                <button type="submit" name="btn-deletar" class="btn green lighten-1">Sim, tenho certeza!</button>
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                            </form>
                        </div>
                        </div>
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
        <br>
        <a href="adicionar.php" type="submit">Adicionar Autor </a>
        <a href="organizar-fornecedores.php" class="btn deep-purple lighten-2"><i class="material-icons left">workspace_premium</i>Verificar Autores</a>
        <br>
                <button class="btn-floating btn-small waves-effect waves-light red darken-1" 
                style="width: 50px; height: 50px; right: -95%; buttom: 0%"
                title="Sair" aria-pressed="false"> 
                <a href="../logout.php" class ="" ><i class="material-icons">exit_to_app</i></a>
                </button>
                <br> 
        </div>
    </div>
</div>
<?php
//Footer
include_once 'includes/footer.php';
?>