<?php
session_start();

include_once './header.php';


//usuario criado
if (isset($_SESSION['creat']) && $_SESSION['creat'] != '') {
    if ($_SESSION['creat'] == 'true') {
    ?>
        <div class="Aviso">
            <div class="contentConcluido">
                <p>Cadastro concluido com sucesso!</p>
            </div>
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
    $pagina = 'home';
    include_once './public/page/' . $pagina . '.php';
endif;



include_once './footer.php';
