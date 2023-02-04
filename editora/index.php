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
        <h4 class ="light">Editora</h4>
        <table class ="striped">
        <table>
            <thread>
                <tr>
                <th>Identificador</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Cidade</th>
                    <th>Email</th>
                    
                </tr>
            </thread>
            <tbody>
                <?php
                $sql = "SELECT * FROM Editora";
                $resultado = mysqli_query($connect, $sql);
                if(mysqli_num_rows($resultado)>0):
                    while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <tr>
                        <td><?php echo $dados['idEditora']; ?></td>
                        <td><?php echo $dados['nomeEditora']; ?></td>
                        <td><?php echo $dados['telefone']; ?></td>
                        <td><?php echo $dados['cidade']; ?></td>
                        <td><?php echo $dados['email']; ?></td>
                        <td><a href="editar.php?idEditora=<?php echo $dados['idEditora']; ?>" class ="btn-floating light-green"><i class ="material-icons">edit</i></a></td>
                        
                        <td><a href="#modal<?php echo $dados['idEditora']; ?>" class ="btn-floating red lighten-1 modal-trigger"><i class ="material-icons">delete</i></a></td>
                    
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['idEditora']; ?>" class="modal">
                            <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja excluir essa editora?</p>
                            </div>
                            <div class="modal-footer">
                            
                            <form action="php_action/delete.php" method="POST">
                                <input type="hidden" name="idEditora" value="<?php echo $dados['idEditora']; ?>">
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
                </tr>
                <?php 
                endif;
                ?>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn deep-purple lighten-2"><i class ="material-icons left">person_add</i>Adicionar Editora </a>
        <a href="organizar-fornecedores.php" class="btn deep-purple lighten-2"><i class="material-icons left">workspace_premium</i>Verificar Editoras</a>
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