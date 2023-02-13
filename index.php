
<?php
//conexão
require_once ('../cedrico/administrador/php_action/bdconnect.php');

session_start();

//BOTAO ENVIAR
if(isset($_POST['ENTRAR'])):
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if(empty($login) or empty($senha)):
        $erros[] = " <li> Todos os campos devem ser preenchidos </li>";
    else:
        $sql = "SELECT login FROM administrador WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0):
            $senha = md5($senha);

            $sql = "SELECT * FROM administrador WHERE login = '$login' AND senha ='$senha' ";
            $resultado = mysqli_query($connect, $sql);
            mysqli_close($connect);
            
            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $_SESSION['idAdmin'] = $dados['id'];
                header('Location: home.php');
            else:
                $erros[] = "<li> Usuário e Senha não conferem </li>";
            endif;

        else:
            $erro[] = "<li> Usuário Inexistente </li>";
        endif;

    endif;

endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="assets/css/login.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Login</title>
  </head>
  <body>
    <div class="image-login">
      <img src="assets/img/Bibliophile-bro.svg" alt="" />
    </div>
    <div class="card-login">
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    <form class="card" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h1>LOGIN</h1>
        <div class="input-text">
          <label for="login">Login:</label>
          <input type="text" id="login"  name="login"/>
        </div>
        <div class="input-text">
          <label for="password">Senha:</label>
          <input type="password" id="password" name="senha" />
        </div>
        <input type="submit" value="ENTRAR" />
      </form>
    </div>
  </body>
</html>
