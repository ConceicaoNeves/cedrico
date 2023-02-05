<?php

//conexao
include_once '../livro/php.action/connect-bd.php';
//Header
include_once 'includes/header.php';
//Select
if(isset($_GET['idLivro'])):
    $idLivro = mysqli_escape_string($connect, $_GET['idLivro']);

    $sql = "SELECT * FROM livro WHERE idLivro = '$idLivro'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);

endif;

?> 
<body style="background-color: #8b7293">
<body background="../atestes.png"> 
<br><br><br>
<div class="container">
    <div class = "col s12 m6 push-m3">
    <div class="card-panel purple lighten-5">
    <td><a href="index.php" class=""><i class="material-icons">arrow_back_ios</i></a></td>
        <h3 class ="light"> Editar Livro</h3>
        <form action="../livro/php.action/update-livro.php" method="POST">
            <input type= "hidden" name= "idLivro" value="<?php echo $dados['idLivro'];?>">
            <div class="input-field col s12">

                    <input type="text" name="titulo" id="titulo" value="<?php echo $dados['titulo'];?>">
                    <label for="Titulo">Titulo</label>
                </div>
                <select  id="idEditora" name="idEditora" value="<?php echo $dados['idEditora'];?>">
                <option value="text" disabled selected>Escolha a Editora</option>
                <?php
                    $sql="SELECT idEditora,idEditora, nomeEditora,cidade
                    from editora";

                    $result=mysqli_query($connect,$sql);

                    while ($editora=mysqli_fetch_row($result)):
                        ?>
                        <option value="<?php echo $editora[0] ?>"><?php echo $editora[1]." - ".$editora[2]." - ".$editora[3] ?></option>
                    <?php endwhile; ?>
                </select>
                
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
                <div class="input-field col s12">
                    <input type="number" name="preco" id="preco" value="<?php echo $dados['preco'];?>">
                    <label for="preco">Preço</label>
                </div>
                <div class="input-field col s12">
                    <input type="date" name="anoPublicacao" id="anoPublicacao" value="<?php echo $dados['anoPublicacao'];?>">
                    <label for="anoPublicacao">Ano de Publicação</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="edicao" id="edicao" value="<?php echo $dados['edicao'];?>">
                    <label for="edicao">Edição</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="genero" id="genero" value="<?php echo $dados['genero'];?>">
                    <label for="genero">Gênero</label>
                </div>
            <button type="submit" name="btn-editar" class="btn deep-purple lighten-2"><i class="material-icons left">add_task</i>Atualizar </button>
            <a href="index.php" class="btn"><i class="material-icons left">summarize</i>Lista de Livros</a>
            <br>
                <button class="btn-floating btn-small waves-effect waves-light red darken-1" 
                style="width: 50px; height: 50px; right: -95%; buttom: 0%"
                title="Sair" aria-pressed="false"> 
                <a href="../logout.php" class ="" ><i class="material-icons">exit_to_app</i></a>
                </button>
                <br> 
                </div>
        </form>
    </div>
</div>
<?php
//Footer
include_once 'includes/footer.php';
?>