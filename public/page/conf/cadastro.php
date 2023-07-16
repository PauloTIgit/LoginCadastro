<?php

// if (empty($_POST['email']) || empty($_POST['senha'])) {
//     header('Location: index.php');
//     die();
// }

//definimos a conexão 
include('conexao.php');



//definimos algumas variaveis
$usuario = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$nivel = 'admin';
$status = 'ativo';
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);


$query = "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($conexao, $query);


if(mysqli_num_rows($result) == 0):

    //definimos o comandar a dar no banco de dados
    $query = "INSERT INTO `plataforma`.`usuarios`( `usuario`,   `email`,      `senha`,      `nivel`,   `status`)
                                        VALUES ('{$usuario}','{$email}','{$senhaHash}','{$nivel}',    '{$status}')";
    $result = mysqli_query($conexao, $query);

elseif(mysqli_num_rows($result) >= 1):
    $_SESSION['creat'] = 'false';
    header('location: index.php');
    die();

endif;

$_SESSION['creat'] = 'true';
// Redirecionamento 
header('location: index.php');


