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
                <form action="./registro.php" method="post" class="form form-registro">
                    <h2 class="form-title">Criar conta</h2>
                    <div class="form-input-container">
                        <input type="text" class="form-input form-user" placeholder="Nome" required>
                        <input type="email" class="form-input form-user" placeholder="E-mail" required>
                        <input type="password" class="form-input form-pass" placeholder="Senha" required>
                    </div>
                    <input type="submit" class="form-button" value="Cadastrar">
                </form>
                <!--Fim do Cadastro-->
                <?php
                //variaveis do login
                $user = $_POST['email'];
                $senha = $_POST['senha'];
                if ($user == 'paulo@gmail.com' && $senha == '1234') {
                    header('Location: ./plataforma/index.php');
                }
                ?>
            </div>
            <div class="overlay-container">
                <div class="overlay over-entrar">
                    <h2 class="overlay-title">Já tem conta?</h2>
                    <p class="overlay-text">Para entrar na nossa plataforma faça login com sua credencial</p>
                    <button class="overlay-button" onclick="eventOverlay()">Entrar</button>
                </div>
                <div class="overlay over-registro">
                    <h2 class="overlay-title">Olá Aluno</h2>
                    <p class="overlay-text">Cadastre-se e comece a usar a nossa plataforma Online</p>
                    <button class="overlay-button" onclick="eventOverlay()">Cadastrar</button>
                </div>
            </div>

        </div>
    </section>
    <script src="./js/script.js"></script>
</body>

</html>