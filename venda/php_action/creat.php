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
    $preco = clear($_POST['preco']);
    $dataVenda = clear($_POST['dataVenda']);
    $cpfComprador = clear($_POST['$cpfComprador']);

    if(empty($idLivro) or empty($preco) or empty($dataVenda)):
        $_SESSION['mensagem'] = "Venda não realizado!! Campos preenchidos incorretamente!";
        header('Location: ../index.php');
    else:
    

        $sql = "INSERT INTO venda (idLivro, preco, dataVenda, cpfComprador) VALUES ('$idLivro', '$preco', '$dataVenda', '$cpfComprador')";

        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Venda registrada!";
            header('Location: ../index.php');
        else:
            $_SESSION['mensagem'] = "Venda não registrada!";
            header('Location: ../index.php');
        endif;
        
    endif;

endif;