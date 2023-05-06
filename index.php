<?php
session_start();

include_once './header.php';

if(isset($_GET['pagina'])){
    $pagina = trim(strip_tags(filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_URL)));
}

if (isset($_GET['conf'])) {
    $conf = trim(strip_tags(filter_input(INPUT_GET, 'conf', FILTER_SANITIZE_URL)));
}

if(isset($_SESSION['erro']) && $_SESSION['erro'] != ''):
        echo $_SESSION['erro'];
        unset($_SESSION['erro']);
        $_SESSION['nivel'] = '';
        $_SESSION['session'] = '';
endif;


if(isset($_GET['conf'])){
    include_once './public/page/conf/'. $conf . '.php';
}elseif(isset($_GET['pagina'])){
    include_once './public/page/'.$pagina. '/' . $pagina . '.php';
}else{
    $pagina = 'pageLoginCadastro';
    include_once './public/page/' . $pagina . '/' . $pagina . '.php';
}




include_once './footer.php';
