    <section class="main">
        <div class="login-container" id="login-container">
            <div class="form-container">

                <!--Inicio do Login-->
                <form action="?conf=login" method="post" class="form form-login">
                    <h2 class="form-title">Entrar com</h2>
                    <?php
                    // if (isset($_SESSION['nao_autenticado'])) :
                    ?>
                    <div class="notificationErro">
                        <p>Usuário não cadastrado</p>
                    </div>
                    <?php
                    // endif;
                    // unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="form-input-container">
                        <input name="email" type="email" class="form-input form-user" placeholder="E-mail" required>
                        <input name="senha" type="password" class="form-input form-pass" placeholder="Senha" required>
                    </div>
                    <input type="submit" class="form-button" value="Entrar">
                </form>
                <!--Fim do Login-->

                <!--Inicio do Cadastro-->
                <form action="?conf=cadastro" method="post" class="form form-registro">
                    <h2 class="form-title">Criar conta</h2>
                    <div class="form-input-container">
                        <input name="nome" type="text" class="form-input form-user" placeholder="Nome" required>
                        <input name="email" type="email" class="form-input form-user" placeholder="E-mail" required>
                        <input name="senha" type="password" class="form-input form-pass" placeholder="Senha" required>
                    </div>
                    <input type="submit" class="form-button" value="Cadastrar">
                </form>
                <!--Fim do Cadastro-->

            </div>
            <div class="overlay-container">
                <div class="overlay over-entrar">
                    <h2 class="overlay-title">Já tem conta?</h2>
                    <p class="overlay-text">Para entrar na nossa plataforma faça login com sua credencial</p>
                    <button class="overlay-button" onclick="eventOverlay()">Entrar</button>
                </div>
                <div class="overlay over-registro">
                    <h2 class="overlay-title">Plataforma</h2>
                    <p class="overlay-text">Cadastre-se e comece a usar a nossa plataforma Online</p>
                    <button class="overlay-button" onclick="eventOverlay()">Cadastrar</button>
                </div>
            </div>
        </div>
    </section>