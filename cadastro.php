<?php

include('conexao.php');

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

// $nome = mysqli_real_escape_string($conexao, 'teste');
// $email = mysqli_real_escape_string($conexao, 'teste@gmail.com');
// $senha = mysqli_real_escape_string($conexao, '123');

$query = "INSERT INTO `plataforma`.`usuario` (`usuario`, `email`, `senha`) VALUES ('{$nome}', '{$email}', MD5('{$senha}'));";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

echo $row;
// header('location: ligin-cadastro.php');