<?php
session_start();

if (!isset($_SESSION['session']) || isset($_SESSION['session']) && $_SESSION['session'] != 1) :
    $_SESSION['erro'] = 'sessao';
    header('Location: ./?pagina=home');
    die();
endif;

if (!isset($_SESSION['nivel']) || isset($_SESSION['nivel']) && $_SESSION['nivel'] != 'user') :
    $_SESSION['erro'] = 'permicao';
    header('Location: ./?pagina=home');;
    die();
endif;


echo 'Bem-vindo Usuário';

