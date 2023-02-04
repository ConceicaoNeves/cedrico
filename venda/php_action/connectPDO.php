<?php 
//conexao co o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "lotus";
$port = 3306;

try{
    //conexão com a porta
    //$connect = new PDO("mysql:host=$servername;port=$port;db_name=" . $db_name, $username, $password);
    
    //conexão sem a porta
    $connect = new PDO("mysql:host=$servername;db_name=" . $db_name, $username, $password);
   
    //echo "conexão realizada com sucesso";

}catch(PDOException $err){
    //echo "Erro: conexão não realizada com sucesso. Erro gerado" . $err->getMessage();
}

?>