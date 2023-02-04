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
            <a href="index.php" class=""><i class="material-icons">arrow_back_ios</i></a>
            <h4 class ="light">Verificar</h4>	
            <form action="">
                <input name="organizar" value="<?php if(isset($_GET['organizar'])) echo $_GET['organizar']; ?>" placeholder="Digite os termos de pesquisa" type="text">
                <button type="submit" class="btn deep-purple lighten-2">Pesquisar</button>
            </form>
            <br>
            <table width="600px" border="1">
                <tr>
                    <th>Identificador Fornecedor</th>
                    <th>Identificador Produto</th>
                    <th>Produto</th>
                </tr>
                <?php
                if (!isset($_GET['organizar'])) {
                    ?>
                <tr>
                    <td colspan="3">Digite algo para pesquisar...</td>
                </tr>
                <?php
                } else {
                    $organizar = mysqli_escape_string($connect, $_GET['organizar']);
                    $sql_code = "SELECT produto.idProduto, produto.nomeProduto ,(fornecedor.idFornecedor)
                    AS fornecedor FROM fornecedor LEFT JOIN produto ON
                    fornecedor.idFornecedor = produto.idFornecedor WHERE produto.idFornecedor
                    = $organizar;";

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
                                <td><?php echo $dados['fornecedor']; ?></td>
                                <td><?php echo $dados['idProduto']; ?></td>
                                <td><?php echo $dados['nomeProduto']; ?></td>
                                
                            </tr>
                            <?php
                        }
                    }
                    ?>
                <?php
                } ?>
            </table>
            <br>
                <button class="btn-floating btn-small waves-effect waves-light red " 
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
include_once '../produto/includes/footer.php';

