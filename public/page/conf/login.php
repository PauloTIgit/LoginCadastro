<?php

// definimos a conexão 
include('conexao.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

// definimos algumas variaveis
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$senhaHash = md5($senha);
$senhaHashLower = strtolower($senhaHash);

// definimos o comandar a dar no banco de dados
$verificarADM = " SELECT * FROM plataforma . usuario WHERE email = '{$email}' AND senha = '{$senhaHashLower}' AND adm = '1'  ";
$verificarUSE = " SELECT * FROM plataforma . usuario WHERE email = '{$email}' AND senha = '{$senhaHashLower}' AND adm = '0'  ";

$userADM = mysqli_num_rows(mysqli_query($conexao, $verificarADM));
if($userADM >= 1){
    header('Location: ?pagina=loginAdministrador');
    exit();
}else{
    echo'erro adm';
}

$userUSE = mysqli_num_rows(mysqli_query($conexao, $verificarUSE));
if ($userUSE >= 1) {
    header('Location: ?pagina=loginUsuario');
    exit();
}else{
    header('Location: ./public/page/loginUsuario/loginUsuario.php');

}



// if($row >= 1){
//     header('Location: ?pagina=loginAdministrador');

// }
// if($row == 0){
//     echo 'Usuario não existe por fazor realize o cadastro';
// }

