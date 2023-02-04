<?php
//Header
include_once 'includes/header.php';
include_once '../produto/php.action/connect-bd.php'
?> 
<body style="background-color: #8b7293">
<body background="../atestes.png"> 
<br><br><br>
<div class="container">
    <div class ="col s12 m6 push-m3">
        <div class="card-panel purple lighten-5">
        <a href="index.php" class=""><i class="material-icons">arrow_back_ios</i></a>
            <h3 class ="light">Ordenação por Preço</h3>
            <table class="striped">
            <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT nomeProduto, valorVenda FROM produto ORDER BY valorVenda;";
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0):
                        while($dados = mysqli_fetch_array($resultado)):
                        ?>
                            <tr>
                                <td><?php echo $dados['nomeProduto']; ?></td>
                                <td><?php echo $dados['valorVenda']; ?></td>
                                <?php endwhile;
                        else: ?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>

                        </tr> 
                    <?php
                    endif;
                    ?>
        </div>
                </table>
        <br>
                <button class="btn-floating btn-small waves-effect waves-light red darken-1" 
                style="width: 50px; height: 50px; right: -95%; buttom: 0%"
                title="Sair" aria-pressed="false"> 
                <a href="../logout.php" class ="" ><i class="material-icons">exit_to_app</i></a>
                </button>
                <br> 
    </div>

</div>
        
<?php
//Footer
include_once 'includes/footer.php';
?>          