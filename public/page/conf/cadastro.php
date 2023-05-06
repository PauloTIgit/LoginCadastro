<?php
session_start();

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: index.php');
    die();
}

//definimos a conexão 
include('conexao.php');



//definimos algumas variaveis
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$senhaHash = md5($senha);
$senhaHashLower = strtolower($senhaHash);

//definimos o comandar a dar no banco de dados
$query = "INSERT INTO `plataforma`.`usuario` (`nome`, `email`, `senha` , `nivel` , `status`) VALUES ('{$nome}', '{$email}', '{$senhaHashLower}', 'user', 'null')";

$result = mysqli_query($conexao, $query);

//Redirecionamento 
header('location: ?pagina=pageLoginCadastro');


