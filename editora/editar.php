<?php
//Header
include_once 'php_action/bdconnect.php';
include_once 'includes/header.php';
if (isset($_GET['idEditora'])):
    $idEditora = mysqli_escape_string($connect, $_GET['idEditora']);
    $sql = "SELECT * FROM editora WHERE idEditora ='$idEditora'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?> 
<body style="background-color: #8b7293">
<body background="../atestes.png"> 
<br><br><br>
<div class="container">
    <div class= "col s12 m6 push-m3">
    <div class="card-panel purple lighten-5">
    <a href="index.php" class=""><i class="material-icons">arrow_back_ios</i></a>
        <h3 class ="light">Editar Editora</h3>
        <form action="php_action/update.php" method="POST">
            <input type= "hidden" name = "idEditora" value="<?php echo $dados['idEditora'];?>">
            <div class="input-field col s12">
                <input id="icon_prefix" type="text" class="validate" type="text" name="nomeEditora" id="nomeEditora"  value="<?php echo $dados['nomeEditora'];?>">
                <label for="nomeEditora">Nome</label>
            </div>
            <div class="input-field col s12">
            <input id="icon_alternate_email" type="tel" class="validate" type="tel" name="telefone" id="telefone" value="<?php echo $dados['telefone'];?>">
                <label for="telefone">Telefone</label>
            </div>
            <div class="input-field col s12">
                <input id="icon_prefix" type="text" class="validate" type="text" name="cidade" id="cidade" value="<?php echo $dados['cidade'];?>">
                <label for="cidade">Cidade</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email'];?>">
                <label for="email">Email</label>
            </div>
            <br>
            <button type="submit" name="btn-editar" class="btn deep-purple lighten-2"><i class="material-icons left">update</i>Atualizar</button>
            <a href="index.php" class="btn"><i class="material-icons left">list_alt</i>Lista de Editoras</a> 
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