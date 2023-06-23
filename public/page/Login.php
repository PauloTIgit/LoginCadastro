<head>
    <link rel="stylesheet" href="public/css/form.css">
    <link rel="stylesheet" href="public/css/login.css">
</head>

    <section class="main">
        <div class="container">
            <div class="form-container">
                <form action="?conf=login" method="post" class="form form-login">
                    <h2 class="form-title">Entrar</h2>
                    <div class="form-input-container">
                        <input
                            class="form-input form-user" 
                            name="nome_email" 
                            type="text" 
                            placeholder="Nome ou E-mail" 
                            required>

                        <input 
                            class="form-input form-pass" 
                            name="senha" 
                            type="password" 
                            placeholder="Senha" 
                            required>
                    </div>
                    <input type="submit" class="form-button" value="Entrar">
                </form>
            </div>
        </div>
    </section>