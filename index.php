<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <title>Entrar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site de aulas online">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/root.css">
</head>

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

        </div>
    </section>
    <script src="./js/script.js"></script>
</body>

</html>