<?php
//Header
include_once '../venda/includes/header2.php';
include_once '../venda/php_action/connect.php';
?> 
<body style="background-color: #8b7293">
<body background="../atestes.png"> 
<br><br><br>
<div class="container">
    <div class ="col s12 m6 push-m3">
    <div class="card-panel purple lighten-5">
    <a href="index.php" class=""><i class="material-icons">arrow_back_ios</i></a>
    <img class="materialboxed" src="../phpoo.png" style="right: 195px; top: 85px; position: absolute" width="160" height="140" >
        <h3 class ="light">Relatório por Período</h3>
        <form action="">
        <p> Data Inicial: </p>
        <input type="date" name="dataInicio" value="<?php if(isset($_GET['dataInicio'])) echo $_GET['dataInicio']; ?>">
        
        <br><br> <p>Data Final:</p>
        <input type="date" name="dataFinal" value="<?php if(isset($_GET['dataFinal'])) echo $_GET['dataFinal']; ?>">
        <button type="submit" class="btn deep-purple lighten-2">Pesquisar</button>
    </form>
        <table class="striped">
            <tr>
                <th>idVenda</th>
                <th>idLivro</th>
                <th>Valor Venda</th>
                <th>Data</td>
            </tr>
            </thead>
            <tbody>
                <?php
                if (!isset($_GET['dataInicio']) && !isset($_GET['dataFinal'])) {
                    ?>
                <tr>
                    <td colspan="3">Digite algo para pesquisar...</td>
                </tr>
                <?php
                } else {
                $dataInicio = mysqli_escape_string($connect, $_GET['dataInicio']);
                $dataFinal = mysqli_escape_string($connect, $_GET['dataFinal']);
                $sql = "SELECT idVenda, idLivro, preco, dataVenda FROM venda WHERE dataVenda >= '$dataInicio' and dataVenda <= '$dataFinal' ORDER BY dataVenda;";
                $resultado = mysqli_query($connect, $sql);

                if(mysqli_num_rows($resultado) > 0):
                    while($dados = mysqli_fetch_array($resultado)):
                        $dados['dataVenda'] = strtotime($dados['dataVenda'])
                    ?>
                        <tr>
                            <td><?php echo $dados['idVenda']; ?></td>
                            <td><?php echo $dados['idLivro']; ?></td>
                            <td><?php echo $dados['preco']; ?></td>
                            <td><?php echo date('d/m/Y', $dados['dataVenda']); ?></td>
                            <?php endwhile;
                    else: ?>
                    <tr>
                        <td colspan="4">Não foi possível emitir o relatório...</td>
                    </tr> 
                <?php
                endif;
            }
                ?>
            </tbody> 
        </table>

        <td> 
            <input type="button" value="IMPRIMIR" onClick="window.print()" class=" waves-effect waves-light green"/>
        </td>

        <button class="btn-floating btn-small waves-effect waves-light red" 
            style="width: 50px; height: 50px; right: -85%; buttom: 0%"
            title="Sair" aria-pressed="false"> 
            <a href="../logout.php" class ="" ><i class="material-icons">exit_to_app</i></a>
            </button>
            <br>   
        </div>
        </div>
</div>  
<br>
            
<?php
//Footer
include_once 'includes/footer.php';
?>          