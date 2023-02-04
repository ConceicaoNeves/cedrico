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
    $dLivro = clear($_POST['idLivro']);
    $valorUnitario = clear($_POST['valorUnitario']);
    $dataVenda = clear($_POST['dataVenda']);
    $cpfComprador = clear($_POST['$cpfComprador']);

    if(empty($idLivro) or empty($valorUnitario) or empty($dataVenda)):
        $_SESSION['mensagem'] = "Venda não realizado!! Campos preenchidos incorretamente!";
        header('Location: ../index.php');
    else:
    

        $sql = "INSERT INTO venda (idLivro, valorUnitario, dataVenda, cpfComprador) VALUES ('$idLivro', '$valorUnitario', '$dataVenda', '$cpfComprador')";

        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Venda registrada!";
            header('Location: ../index.php');
        else:
            $_SESSION['mensagem'] = "Venda não registrada!";
            header('Location: ../index.php');
        endif;
        
    endif;

endif;