<?php
session_start();


$mysqli = mysqli_connect("localhost", "root", "", "plataforma");

$nome_email = $_POST['nome_email'];
$senha = md5($_POST['senha']);

$query = "SELECT * FROM `plataforma`.`usuario` WHERE nome = '$nome_email' OR email= '$nome_email';";

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
    $_SESSION['erro'] = 'invalidos';
    header('Location: index.php');
    die();
endif;

if ($status != 'ativo') : 
?>

<?php
    $_SESSION['erro'] = 'desativado';
    header('Location: index.php');
    die();
endif;

if ($nivel == 'admin') :
    header('Location: ./?pagina=staff');
elseif ($nivel == 'user') :
    header('Location:./?pagina=plataforma');
else :
    header('Location: index.php');
    die();
endif;

?>

