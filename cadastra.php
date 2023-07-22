<?php 
include_once '../stup/autoload.php';

$Usuarios =  new Usuarios();

$Usuarios->informarUserDados($user_nome, $user_email, $user_telefone, $user_senha);

$Usuarios-> consultarEmail();

