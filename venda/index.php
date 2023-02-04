<?php
//Header
include_once 'php_action/connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';
?> 
<body style="background-color: #8b7293">
<body background="../atestes.png"> 
<br><br><br>
<div class="container">
    <div class ="col s12 m6 push-m3">
    <div class="card-panel purple lighten-5">
    <a href="../home.php" class=""><i class="material-icons">arrow_back_ios</i></a>
        <h3 class ="light">Venda</h3>
        <table class ="striped">
        <table>
            <thread>
                <tr>
                    <th>idVenda</th>
                    <th>Livro</th>
                    <th>Valor Unitário</th>
                    <th>Data</th> 
                    <th>cpfComprador</th>    
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
                        <td><?php echo $dados["valorUnitario"]; ?></td>
                        <td><?php echo date('d/m/Y', $dados['dataVenda']); ?></td>
                        <td><?php echo $dados["cpfComprador"]; ?></td>
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
                </tr>
                <?php 
                endif;
                ?>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class ="btn deep-purple lighten-2"><i class="material-icons left">add_shopping_cart</i>Registrar Nova Venda</a>
        <a href="relatorio2.php" class ="btn deep-purple lighten-2"><i class="material-icons left">find_in_page</i>Relatório</a>

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