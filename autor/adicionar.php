<?php
//Header
include_once 'includes/header.php';
include_once 'includes/message.php';
?> 
<body style="background-color: #8b7293">
<body background="../atestes.png"> 
<br><br><br>
<div class="container">
<div class="card-panel purple lighten-5">
    <div class ="col s12 m6 push-m3">
    <a href="index.php" class=""><i class="material-icons">arrow_back_ios</i></a>
        <h3 class ="light">Novo Autor</h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate" type="text" name="nomeAutor" id="nomeAutor">
                <label for="icon_prefix">Nome</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" class="validate" type="text" name="sobrenomeAutor" id="sobrenomeAutor">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">calendar_month</i>
                <input id="icon_prefix" class="validate" type="date" name="dataNascimento" id="dataNascimento">
                <label for="dataNascimento">Data de Nascimento</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">calendar_month</i>
                <input id="icon_prefix" class="validate" type="date" name="dataMorte" id="dataMorte">
                <label for="dataMorte">Data de Falecimento</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate" type="text" name="nacionalidade" id="nacionalidade">
                <label for="nacionalidade">Nacionalidade</label>
            </div>
            <button type="submit" name="btn-cadastrar" class="btn deep-purple lighten-2"><i class="material-icons left">add_circle_outline</i>Cadastrar</button>
            <a href="index.php" class="btn"><i class="material-icons left">list</i>Lista de Autores</a>
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
?>