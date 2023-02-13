<?php
//Header
include_once 'php_action/bdconnect.php';
include_once 'includes/header.php';
if (isset($_GET['idAdmin'])):
    $idAdmin = mysqli_escape_string($connect, $_GET['idAdmin']);
    $sql = "SELECT * FROM administrador WHERE idAdmin ='$idAdmin'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?> 
<body style="background-color: #8b7293">
<body background="../atestes.png"> 
<br><br><br>
<div class="row">
    <div class= "col s12 m6 push-m3">
    <div class="card-panel purple lighten-5">
    <a href="index.php" class=""><i class="material-icons">arrow_back_ios</i></a>
        <h3 class ="light">Editar Administrador</h3>
        <form action="php_action/update.php" method="POST">
            <input type= "hidden" name = "idAdmin" value="<?php echo $dados['idAdmin'];?>">
            <div class="input-field col s12">
                <input type="text" name="nomeAdmin" id="nomeAdmin" value="<?php echo $dados['nomeAdmin'];?>">
                <label for="nomeAdmin">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenomeAdmin" id="sobrenomeAdmin" value="<?php echo $dados['sobrenomeAdmin'];?>">
                <label for="sobrenomeAdmin">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="login" id="login" value="<?php echo $dados['login'];?>">
                <label for="login">login</label>
            </div>
            <div class="input-field col s12">
                <input type="password" name="senha" id="senha" value="<?php echo MD5($dados['senha']);?>">
                <label for="senha">senha</label>
            </div>
            <br>
            <button type="submit" name="btn-editar" class="btn deep-purple lighten-2"><i class="material-icons left">update</i>Atualizar</button>
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
</div>
<?php
//Footer
include_once 'includes/footer.php';