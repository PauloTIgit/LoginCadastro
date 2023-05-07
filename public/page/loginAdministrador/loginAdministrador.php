<?php

if (!isset($_SESSION['session']) || isset($_SESSION['session']) && $_SESSION['session'] != 1) :
    $_SESSION['erro'] = 'Erro na sessao';
    header('Location: ../../../index.php');
    die();
endif;

if (!isset($_SESSION['nivel']) || isset($_SESSION['nivel']) && $_SESSION['nivel'] != 'admin') :
    $_SESSION['erro'] = 'Você não tem permição para acessar essa pagina!';
    header('Location: ../../../index.php');
    die();
endif;


$mysqli = mysqli_connect("localhost", "root", "", "plataforma");


$query = "SELECT * FROM `plataforma`.`usuario`;";
$result = mysqli_query($mysqli, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<section>
    <br>
    <p class="title"> <?php echo 'Bem-Vindo ' . $_SESSION['nome']; ?> </p>
    <div>
        <!-- <table class="tabelaUsers">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Permições</th>
                <th>Status</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
            <tr>
                <th><?php echo $row['nome']; ?></th>
                <th><?php echo $row['email']; ?></th>
                <th><?php echo $row['nivel']; ?></th>
                <th><?php echo $row['status']; ?></th>
                <br>
            </tr>
            <?php endforeach; ?>
        </table> -->
    </div>
</section>