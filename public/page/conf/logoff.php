<?php
    $_SESSION['nome'] = '';
    $_SESSION['erro'] = '';
    session_unset();
    header('location: ?pagina=login');
?>