<?php

    if (!isset($_SESSION['session']) || isset($_SESSION['session']) && $_SESSION['session'] != 1) :
        $_SESSION['erro'] = 'sessao';
        header('Location: ./?pagina=home');
        die();
    endif;

    if (!isset($_SESSION['nivel']) || isset($_SESSION['nivel']) && $_SESSION['nivel'] != 'admin') :
        $_SESSION['erro'] = 'permicao';
        header('Location: ./?pagina=home');
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



<section id="tela" class="page dia">
    <div class="icon_dark-ligth">
        <i id="icon_dia" class="fa icon_dia fa-sun-o" aria-hidden="true"></i>
        <i id="dia_noite" class="fa radio fa-toggle-off" aria-hidden="true"></i>
        <i id="icon_noite" class="fa icon_noite fa-moon-o" aria-hidden="true"></i>
    </div>
    <p class="title"> <?php echo 'Bem-Vindo ' . $_SESSION['nome']; ?> </p>
   
</section>



