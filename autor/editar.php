<?php
//Header
include_once 'php_action/bdconnect.php';
include_once 'includes/header.php';
if (isset($_GET['idAutor'])):
    $idAutor = mysqli_escape_string($connect, $_GET['idAutor']);
    $sql = "SELECT * FROM autor WHERE idAutor ='$idAutor'";
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
        <h3 class ="light">Editar Autor</h3>
        <form action="php_action/update.php" method="POST">
            <input type= "hidden" name = "idAutor" value="<?php echo $dados['idAutor'];?>">
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate" type="text" name="nomeAutor" id="nomeAutor" value="<?php echo $dados['nomeAutor'];?>">
                <label for="icon_prefix">Nome</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" class="validate" type="text" name="sobrenomeAutor" id="sobrenomeAutor" value="<?php echo $dados['sobrenomeAutor'];?>">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">calendar_month</i>
                <input id="icon_prefix" class="validate" type="date" name="dataNascimento" id="dataNascimento" value="<?php echo $dados['dataNascimento'];?>">
                <label for="dataNascimento">Data de Nascimento</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">calendar_month</i>
                <input id="icon_prefix" class="validate" type="date" name="dataMorte" id="dataMorte" value="<?php echo $dados['dataMorte'];?>">
                <label for="dataMorte">Data de Falecimento</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate" type="text" name="nacionalidade" id="nacionalidade" value="<?php echo $dados['nacionalidade'];?>">
                <label for="nacionalidade">Nacionalidade</label>
            </div>
            <br>
            <button type="submit" name="btn-editar" class="btn deep-purple lighten-2"><i class="material-icons left">update</i>Atualizar</button>
            <a href="index.php" class="btn"><i class="material-icons left">list_alt</i>Lista de Autores</a> 
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