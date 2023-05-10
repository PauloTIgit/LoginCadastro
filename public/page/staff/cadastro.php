<?php

// Verificar seção
if (!isset($_SESSION['session']) || isset($_SESSION['session']) && $_SESSION['session'] != 1) :
    $_SESSION['erro'] = 'sessao';
    header('Location: index.php');
    die();
endif;
// Verificar Previlegios
if (!isset($_SESSION['nivel']) || isset($_SESSION['nivel']) && $_SESSION['nivel'] != 'admin') :
    $_SESSION['erro'] = 'permicao';
    header('Location: index.php');
    die();
endif;


$mysqli = mysqli_connect("localhost", "root", "", "plataforma");
$query = "SELECT * FROM `plataforma`.`usuario`;";
$result = mysqli_query($mysqli, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<section>
    <button class="burguer" onclick="toggleMenu()"></button>
    <div class="background"></div>
    <div class="menu">
        <nav>
            <a href="?pagina=staff" style="animation-delay: 0.1s">Home</a>
            <a href="?pagina=staff/cadastro" style="animation-delay: 0.2s">Cadastros</a>
            <!-- <a href="#" style="animation-delay: 0.25s"></a>
            <a href="#" style="animation-delay: 0.3s"></a> -->
            <a href="#" style="animation-delay: 0.35s">Helpdesk</a>
            <a href="?conf=logoff" style="animation-delay: 0.4s">Sair</a>
        </nav>
    </div>
</section>



<section id="tela" class="page">
    <p class="title"> <?php echo 'Cadastros' ?> </p>
    <p>home > cadastro</p>
    <div>
        <table class="tabelaUsers">
            <div class="bloco">
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
            </div>
        </table>
    </div>
</section>