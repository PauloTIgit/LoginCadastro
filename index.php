<?php
session_start();

include_once './header.php';


<<<<<<< HEAD
<body>
    <?php
    
    ?>
    <section class="main">
        <div class="login-container" id="login-container">
            <div class="form-container">
                <!--Inicio do Login-->
                <form action="" method="get" class="form form-login">
                    <h2 class="form-title">Entrar com</h2>
                    <div class="form-input-container">
                        <input name="email" type="email" class="form-input form-user" placeholder="E-mail" required>
                        <input name="senha" type="password" class="form-input form-pass" placeholder="Senha" required>
                    </div>
                    <input type="submit" class="form-button" value="Entrar">
                </form>
                <!--Fim do Login-->

                <!--Inicio do Cadastro-->
                <form action="./registro.php" method="POST" class="form form-registro">
                    <h2 class="form-title">Criar conta</h2>
                    <div class="form-input-container">
                        <input name="nome" type="text" class="form-input form-user" placeholder="Nome" required>
                        <input name="telefone" type="tel" class="form-input form-user" placeholder="Celular" required>
                        <input name="email" type="email" class="form-input form-user" placeholder="E-mail" required>
                        <input name="senha" type="password" class="form-input form-pass" placeholder="Senha" required>
                    </div>
                    <input name="cadastrar" type="submit"  class="form-button" value="Cadastrar">
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay over-entrar">
                    <h2 class="overlay-title">Já tem conta?</h2>
                    <p class="overlay-text">Faça o login para reservar Online </p>
                    <button class="overlay-button" onclick="eventOverlay()">Entrar</button>
                </div>
                <div class="overlay over-registro">
                    <h2 class="overlay-title">Suas Reservas</h2>
                    <p class="overlay-text">Cadastre-se para realizar <br> suas reservas Online</p>
                    <button class="overlay-button" onclick="eventOverlay()">Cadastrar</button>
                </div>
            </div>

=======
//usuario criado
if (isset($_SESSION['creat']) && $_SESSION['creat'] != '') {
    if ($_SESSION['creat'] == 'true') {
    ?>
        <div class="Aviso">
            <div class="contentConcluido">
                <p>Cadastro concluido com sucesso!</p>
            </div>
>>>>>>> 7e2f2b5012c1169134d5cfb376ff409ef8b34bf7
        </div>
    <?php

    }
    //Esse erro denomina erro de email e senha
    elseif ($_SESSION['creat'] == 'false') {
    ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>Já existente um login com essas credenciais!</p>
            </div>
        </div>
    <?php

    }

    $_SESSION['creat'] = '';
}

// Inicio Tratamento de erros
if (isset($_SESSION['erro']) && $_SESSION['erro'] != '') :

    //Esse erro denomina erro de status 
    if ($_SESSION['erro'] == 'desativado') : ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>Usuário esta desativado, entre em contato com o administrador!</p>
            </div>
        </div>
    <?php endif;

    //Esse erro denomina erro de email e senha 
    if ($_SESSION['erro'] == 'invalidos') : ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>E-mail ou Senha invalido!</p>
            </div>
        </div>
    <?php endif;

    //Esse erro denomina erro de permição
    if ($_SESSION['erro'] == 'permicao') : ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>Você não tem permição para entrar aqui!</p>
            </div>
        </div>
    <?php endif;

    //Esse erro denomina erro de session
    if ($_SESSION['erro'] == 'sessao') : ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>ERRO na sessão, faça o logi novamente!</p>
            </div>
        </div>
    <?php endif;

    $_SESSION['erro'] = '';
    $_SESSION['nivel'] = '';
    $_SESSION['session'] = '';

endif;
// Fim


/**
 * Sitema de Rotas
 */

if (isset($_GET['pagina'])) {
    $pagina = trim(strip_tags(filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_URL)));
    if(!file_exists('./public/page/' . $pagina . '.php')):
        $pagina = '404';
    endif;
    include_once './public/page/' . $pagina . '.php';
}

if (isset($_GET['conf'])) {
    $conf = trim(strip_tags(filter_input(INPUT_GET, 'conf', FILTER_SANITIZE_URL)));
}



if (isset($_GET['conf'])) :
    include_once './public/page/conf/' . $conf . '.php';

elseif (isset($_GET['pagina'])) :
    include_once './public/page/' . $pagina . '.php';
else :
    $pagina = 'hero_page';
    include_once './public/page/' . $pagina . '.php';
endif;



include_once './footer.php';
