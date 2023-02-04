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
    $idProduto = clear($_POST['idProduto']);
    $valorUnitario = clear($_POST['valorUnitario']);
    $valorVenda = clear($_POST['valorVenda']);
    $sql_venda = "INSERT INTO produto (valorVenda) VALUES ('$ivalorVenda')";
    $sql = "INSERT INTO venda (idProduto, valorUnitario, dataVenda) VALUES ('$idProduto', '$valorVenda', '$dataVenda')";
    if(mysqli_query($connect, $sql_venda)):
        
   

        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Cadastro com sucesso!";
            header('Location: ../index.php');
        else:
            $_SESSION['mensagem'] = "Cadastro não realizado!";
            header('Location: ../index.php');
            
        endif;
    endif;

endif;