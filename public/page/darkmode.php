<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link 
            rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        />
        <link href="public/css/sapato.css" rel="stylesheet">
        <script src="public/js/sapato.js" defer></script>
        <title>Dark Mode</title>
    </head>
    <body>
        <header>
            <h2>Ligth Dark</h2>
            <div>
                <input type="checkbox" name="change-theme" id="change-theme" />
                <label for="chage-theme">
                    <i class="bi bi-sun"></i>
                    <i class="bi bi-moon"></i>
                </label>
            </div>
        </header>
        <main>
            <div class="card">
                <div class="card-image">
                    <span>Nike</span>
                    <img src="public/img/tenis.png" alt="Tênis Nike">
                </div>
                <div class="card-details">
                    <h2>Tênis Nike</h2>
                    <p class="subtitle">Exelente para corrida</p>
                    <p class="description">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure ipsum cum qui ab assumenda quibusdam molestias nesciunt possimus incidunt velit eos consequatur rerum, doloremque, vitae neque blanditiis dicta iste beatae.
                    </p>
                    <div class="price-container">
                        <span class="price">R$299,99</span>
                        <button class="btn">Comprar</button>
                    </div>
                </div>
            </div>
        </main>
        
    </body>
</html>