<?php
include '../produto/php.action/connect-bd.php';
//Header
include_once '../produto/includes/header.php';
?> 
<body style="background-color: #8b7293">
<body background="../atestes.png"> 
<br><br><br>
<div class="container">
    <div class="col s12 m6 push-m3">
    <div class="card-panel purple lighten-5">
    <td><a href="index.php" class=""><i class="material-icons">arrow_back_ios</i></a></td>
    <h4 class ="light">Pesquisar</h4>	
    <form action="">
        <input name="pesquisar" value="<?php if(isset($_GET['pesquisar'])) echo $_GET['pesquisar']; ?>" placeholder="Digite os termos de pesquisa" type="text">
        <button type="submit" class="btn deep-purple lighten-2">Pesquisar</button>
    </form>
    <br>
    <table width="600px" border="1">
        <tr>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
        </tr>
        <?php
        if (!isset($_GET['pesquisar'])) {
            ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = mysqli_escape_string($connect, $_GET['pesquisar']);
            $sql_code = "SELECT * 
                FROM produto
                WHERE marca LIKE '%$pesquisa%' 
                OR nomeProduto LIKE '%$pesquisa%'";
            $sql_query = mysqli_query($connect, $sql_code); 
            
            if (mysqli_num_rows($sql_query) == 0){
                ?>
            <tr>
                <td colspan="3">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = mysqli_fetch_assoc($sql_query)) {
                    ?>
                    <tr>
                        <td><?php echo $dados['nomeProduto']; ?></td>
                        <td><?php echo $dados['marca']; ?></td>
                        <td><?php echo $dados['valorVenda']; ?></td>
                        <td><a href="editar-produto.php?idProduto=<?php echo $dados['idProduto']; ?>" class="btn-floating light-green"><i class="material-icons">edit</i></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>
    <br>
                <button class="btn-floating btn-small waves-effect waves-light red darken-1" 
                style="width: 50px; height: 50px; right: -95%; buttom: 0%"
                title="Sair" aria-pressed="false"> 
                <a href="../logout.php" class ="" ><i class="material-icons">exit_to_app</i></a>
                </button>
                <br> 
</div>
<?php
//Footer
include_once '../produto/includes/footer.php';

