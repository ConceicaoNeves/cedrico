<?php
include_once 'php_action/bdconnect.php';
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
        <h4 class ="light">Administrador</h4>
        <table class ="striped">
        <table>
            <thread>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                </tr>
            </thread>
            <tbody>
                <?php
                $sql = "SELECT * FROM administrador";
                $resultado = mysqli_query($connect, $sql);
                if(mysqli_num_rows($resultado)>0):
                    
                while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['nomeAdmin']; ?></td>
                    <td><?php echo $dados['sobrenomeAdmin']; ?></td>
            
                    <td><a href="editar.php?idAdmin=<?php echo $dados['idAdmin']; ?>" class ="btn-floating light-green"><i class ="material-icons">edit</i></a></td>

                        
                    
                </tr>
                
                <?php 
                endwhile;
                else: ?>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                
                <?php 
                endif;
                ?>

                
            </tbody>
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