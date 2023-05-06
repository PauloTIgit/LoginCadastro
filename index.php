<?php

include_once './header.php';

if(isset($_GET['pagina'])){
    $pagina = trim(strip_tags(filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_URL)));
    if(!file_exists('./public/page/'.$pagina.'.php')):
        $pagina = '404';
    endif;
}

if (isset($_GET['conf'])) {
    $conf = trim(strip_tags(filter_input(INPUT_GET, 'conf', FILTER_SANITIZE_URL)));
}


if(!isset($_GET['conf'])){
    $pagina = 'pageLoginCadastro';
    include_once './public/page/'.$pagina. '/' . $pagina . '.php';
}else{
    include_once './public/page/conf/'. $conf . '.php';
}




include_once './footer.php';
