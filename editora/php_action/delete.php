<?php 
//conexão
session_start();
require_once 'bdconnect.php';

if(isset($_POST['btn-deletar'])):
    $idFornecedor = mysqli_escape_string($connect, $_POST['idFornecedor']);

    $sql = "DELETE FROM fornecedor WHERE idFornecedor ='$idFornecedor'";
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao deletar!";
        header('Location: ../index.php'); //voltar para a tela de index
        
    endif;
endif;