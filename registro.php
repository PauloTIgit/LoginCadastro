<?php
// include 'cadastra.php';
$_SESSION['erro'] = '';
include '../stup/autoload.php';




if(!$_POST['cadastrar']):
    header('Location: index.php');
endif;
$user_nome = trim(strip_tags( filter_input(INPUT_POST, 'nome', FILTER_DEFAULT)));
$user_telefone = trim(strip_tags( filter_input(INPUT_POST, 'telefone', FILTER_DEFAULT)));
$user_email = trim(strip_tags( filter_input(INPUT_POST, 'email', FILTER_DEFAULT)));
$user_senha = password_hash(trim(strip_tags(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT))), PASSWORD_DEFAULT);
$user_status= 'ativo';
$user_nivel = 'user';
$user_cpf ='';
$user_hash = substr(preg_replace('/[^0-9]/', '', hash('adler32', trim(strip_tags(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT))))), 0, 4);

$Usuarios =  new Usuarios();
$Usuarios->informarUserDados($user_nome,$user_email,$user_telefone,$user_senha,$user_status,$user_nivel,$user_cpf,$user_hash);
$Usuarios->consultarEmail();
$resultadoValidar = $Usuarios->consultarEmail();
$resultado = intval($resultadoValidar);

if ($resultado == 0):
    echo ' E-mail cadastrado! ';
    $Usuarios->cadastrarUsuario($user_nome, $user_email, $user_telefone, $user_senha, $user_hash);
else:
    echo ' E-mail já cadastrado! ';
endif;


