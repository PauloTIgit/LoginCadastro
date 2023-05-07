<?php
session_start();

include_once './header.php';

// Inicio Tratamento de erros
if (isset($_GET['erro'])) :

    //Esse erro denomina erro de status ?erro=00001
    if ($_GET['erro'] == '00001') : ?>
        <div class="Aviso">
            <div class="content">
                <p>ERRO: Usuário esta desativado, entre em contato com o administrador!</p>
            </div>
        </div>
    <?php endif;

    //Esse erro denomina erro de email e senha ?erro=01100
    if ($_GET['erro'] == '01100') : ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>ERRO: E-mail e Senha invalidos!</p>
            </div>
        </div>
    <?php endif;

    //Esse erro denomina erro de email e senha ?erro=11111
    if ($_GET['erro'] == '11111') : ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>ERRO: Já existente um login com esse E-mail!</p>
            </div>
        </div>
    <?php endif;
endif;
// Fim

//usuario criado
if (isset($_GET['creat'])) {
    if ($_GET['creat'] == '1') {
    ?>
        <div class="Aviso">
            <div class="contentConcluido">
                <p>Cadastro concluido com sucesso!</p>
            </div>
        </div>
    <?php
    }
}

if (isset($_GET['pagina'])) {
    $pagina = trim(strip_tags(filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_URL)));
}

if (isset($_GET['conf'])) {
    $conf = trim(strip_tags(filter_input(INPUT_GET, 'conf', FILTER_SANITIZE_URL)));
}

if (isset($_SESSION['erro']) && $_SESSION['erro'] != '') :
    echo $_SESSION['erro'];
    unset($_SESSION['erro']);
    $_SESSION['nivel'] = '';
    $_SESSION['session'] = '';
endif;


if (isset($_GET['conf'])) {
    include_once './public/page/conf/' . $conf . '.php';
} elseif (isset($_GET['pagina'])) {
    include_once './public/page/' . $pagina . '/' . $pagina . '.php';
} else {
    $pagina = 'pageLoginCadastro';
    include_once './public/page/' . $pagina . '/' . $pagina . '.php';
}




include_once './footer.php';
