<?php
//conexão
require_once 'connect.php';

//clear
function clear($input) {
    global $connect;
    //sql
    $var = mysqli_escape_string($connect,$input);
    //xss
    $var = htmlspecialchars($var);

    return $var;
}


if(isset($_POST['btn-registrarnovavenda'])):
    $idLivro = clear($_POST['idLivro']);
    $preco = clear(floatval($_POST['preco']));
    $dataVenda = clear($_POST['dataVenda']);
    $quantidade = mysqli_escape_string($connect, $_POST['quantidade']);
    $total = $_POST['total'];

    if (!is_numeric($preco) || !is_numeric($quantidade)) {
        $_SESSION['mensagem'] = "Venda não realizada!! Valores de preço e quantidade devem ser números válidos.";
        header('Location: ../index.php');
    }
    if ($quantidade <= 0) {
        $_SESSION['mensagem'] = "Venda não realizada!! A quantidade deve ser um número positivo.";
        header('Location: ../index.php');
      }
      
      if (!$connect) {
        $_SESSION['mensagem'] = "Venda não realizada!! Não foi possível conectar ao banco de dados.";
        header('Location: ../index.php');
      }
          
      
    if(empty($idLivro) or empty($preco) or empty($dataVenda)):
        $_SESSION['mensagem'] = "Venda não realizado!! Campos preenchidos incorretamente!";
        header('Location: ../index.php');
    else:
    

        $sql = "INSERT INTO venda (idLivro, preco, dataVenda, quantidade, total) 
VALUES ('$idLivro', '$preco', '$dataVenda', '$quantidade', '$total')";

        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Venda registrada!";
            header('Location: ../index.php');
        else:
            $_SESSION['mensagem'] = "Venda não registrada!";
            header('Location: ../index.php');
        endif;
        
    endif;

endif;