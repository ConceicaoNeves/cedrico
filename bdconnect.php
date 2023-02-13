<?php 
//conexao co o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "cedrico";

$conn = new MySQLi($servername, $username, $password, $db_name);


session_start();
    if(!$_SESSION["on"]){
        $_SESSION["on"] = true;
        $_SESSION["log"] = 0;
    }
?>