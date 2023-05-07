<?php
session_start();

include_once './header.php';

// Inicio Tratamento de erros
if (isset($_GET['erro'])) :

    //Esse erro denomina erro de status ?erro=desativado
    if ($_GET['erro'] == 'desativado') : ?>
        <div class="Aviso">
            <div class="content">
                <p>ERRO: Usuário esta desativado, entre em contato com o administrador!</p>
            </div>
        </div>
    <?php endif;

    //Esse erro denomina erro de email e senha ?erro=invalidos
    if ($_GET['erro'] == 'invalidos') : ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>ERRO: E-mail e Senha invalidos!</p>
            </div>
        </div>
    <?php endif;

    //Esse erro denomina erro de email e senha ?erro=login
    if ($_GET['erro'] == 'login') : ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>ERRO: Já existente um login com esse E-mail!</p>
            </div>
        </div>
    <?php endif;

    //Esse erro denomina erro de permição ?erro=permicao
    if ($_GET['erro'] == 'permicao') : ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>ERRO: Você não tem permição para entrar aqui!</p>
            </div>
        </div>
    <?php endif;

    //Esse erro denomina erro de session ?erro=session
    if ($_GET['erro'] == 'session') : ?>
        <div class="Aviso">
            <div class="contentErro">
                <p>ERRO na sessão, logi novamente!</p>
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

if (isset($_SESSION['erro']) && $_SESSION['erro'] != '') :
    echo $_SESSION['erro'];
    unset($_SESSION['erro']);
    $_SESSION['nivel'] = '';
    $_SESSION['session'] = '';
endif;



include_once './footer.php';
