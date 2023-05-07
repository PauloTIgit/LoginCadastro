<?php
session_start();

if (!isset($_SESSION['session']) || isset($_SESSION['session']) && $_SESSION['session'] != 1) :
    $_SESSION['erro'] = 'Erro na sessao';
    header('Location: ./index.php?erro=session');
    die();
endif;

if (!isset($_SESSION['nivel']) || isset($_SESSION['nivel']) && $_SESSION['nivel'] != 'user') :
    $_SESSION['erro'] = 'Você não tem permição para acessar essa pagina!';
    header('Location: ./index.php?erro=permicao');
    die();
endif;


echo 'Bem-vindo Usuário';

