<?php
session_start();


$mysqli = mysqli_connect("localhost", "root", "", "plataforma");

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$query = "SELECT * FROM usuario WHERE email = '$email'";

$result = mysqli_query($mysqli, $query);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($rows as $row) {
    $nome = $row['nome'];
    $nivel = $row['nivel'];
    $senhaBD = $row['senha'];
    $status = $row['status'];


    $_SESSION['nome'] = $nome;
    $_SESSION['nivel'] = $nivel;
    $_SESSION['session'] = 1;
}

if ($senha != $senhaBD) :
    // $_SESSION['erro'] = 'E-mail e Senha invalidos';
    header('Location: index.php?erro=01100');
    die();
endif;

if ($status != 'ativo') : 
?>

<?php
    // $_SESSION['erro'] = 'Usuário esta bloqueado, entrar em contato com administrador';
    header('Location: index.php?erro=00001');
    die();
endif;

if ($nivel == 'admin') :
    header('Location: ./?pagina=loginAdministrador');
elseif ($nivel == 'user') :
    header('Location: public/page/loginUsuario/loginUsuario.php');
else :
    header('Location: index.php');
    die();
endif;

?>

