<?php

include('conexao.php');

// $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
// $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$usuario = mysqli_real_escape_string($conexao, '');
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select plataforma from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);