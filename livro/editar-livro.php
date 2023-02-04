<?php

//conexao
include_once '../produto/php.action/connect-bd.php';
//Header
include_once 'includes/header.php';
//Select
if(isset($_GET['idProduto'])):
    $idProduto = mysqli_escape_string($connect, $_GET['idProduto']);

    $sql = "SELECT * FROM produto WHERE idProduto = '$idProduto'";
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
        <h3 class ="light"> Editar Produto</h3>
        <form action="../produto/php.action/update-produto.php" method="POST">
            <input type= "hidden" name= "idProduto" value="<?php echo $dados['idProduto'];?>">
            <div class="input-field col s12">
                <input type="text" name="nomeProduto" id="nomeProduto" value="<?php echo $dados['nomeProduto']; ?>">
                <label for="nomeProduto">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="marca" id="marca" value="<?php echo $dados['marca'];?>">
                <label for="marca">Marca</label>
            </div>

            <div class="input-field col s12" >
                <select  id="idFornecedor" name="idFornecedor">
                <option value="text" disabled selected>Escolha o fornecedor</option>
                <?php
                    $sql="SELECT idFornecedor,idFornecedor, nome
                    from fornecedor";

                    $result=mysqli_query($connect,$sql);

                    while ($fornecedor=mysqli_fetch_row($result)):
                        ?>
                        <option value="<?php echo $fornecedor[0] ?>"><?php echo $fornecedor[1]." - ".$fornecedor[2] ?></option>
                    <?php endwhile; ?>
                </select>
                <label>Fornecedor</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="valorVenda" id="valorVenda" value="<?php echo $dados['valorVenda']; ?>">
                <label for="valorVenda">Preço</label>
            </div>
            <button type="submit" name="btn-editar" class="btn deep-purple lighten-2"><i class="material-icons left">add_task</i>Atualizar </button>
            <a href="index.php" class="btn"><i class="material-icons left">summarize</i>Lista de Produtos</a>
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
<?php
//Footer
include_once 'includes/footer.php';
?>