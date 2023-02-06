<?php 
//header
include 'php.action/connect-bd.php';
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
            <h3 class="light">Livros</h3>
            <table class="striped">
                <br>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Preço</th>
                        <th>Publicação</th>
                        <th>Edição</th>
                        <th>Editora</th>
                        <th>Autor</th>
                        <th>Gênero</th>
                        <th> <td><a href="pesquisar.php" class="btn-floating deep-purple lighten-2"><i class="material-icons">search</i></a></td> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM livro";
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0):
                        while($dados = mysqli_fetch_array($resultado)):
                        ?>
                            <tr>
                                <td><?php echo $dados['titulo']; ?></td>
                                <td><?php echo $dados['preco']; ?></td>
                                <td><?php echo $dados['anoPublicacao']; ?></td>
                                <td><?php echo $dados['edicao']; ?></td>
                                <td><?php echo $dados['idEditora']; ?></td>
                                <td><?php echo $dados['idAutor']; ?></td>
                                <td><?php echo $dados['genero']; ?></td>
                                <td><a href="editar-livro.php?idLivro=<?php echo $dados['idLivro']; ?>" class="btn-floating  light-green"><i class="material-icons">edit</i></a></td>
                                <td><a href="#modal<?php echo $dados['idLivro']; ?>" class ="btn-floating red lighten-1 modal-trigger"><i class ="material-icons">delete</i></a></td>
                                
                        
                                <!-- Modal Structure -->
                                <div id="modal<?php echo $dados['idLivro']; ?>" class="modal">
                                    <div class="modal-content">
                                    <h4>Tem certeza que deseja excluir esse Livro?</h4>
                                    <p>A operação não poderá ser desfeita.</p>
                                    </div>
                                    <div class="modal-footer">
                                    
                                    <form action="../livro/php.action/delete-livro.php" method="POST">
                                        <input type="hidden" name="idLivro" value="<?php echo $dados['idLivro']; ?>">
                                        <button type="submit" name="btn-deletar" class="btn green lighten-1">Sim, tenho certeza!</button>
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    </form>
                                </div>
                                </div>
                                
                            </tr>
                        <?php endwhile;
                        else: ?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>

                        </tr> 
                    <?php
                    endif;
                    ?>
                </tbody>  
            </table>
            <br>
            <a href="adicionar.php" type="submit">NOVO LIVRO</a>
            <br> 
        </form>
    </div> 
    </body>
</html>
    