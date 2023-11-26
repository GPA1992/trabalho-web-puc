<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/form.css" />
    <link rel="stylesheet" href="./css/index.css" />
    <title>Poke Academy</title>
</head>

<body>
    <header>
        <img src="./assets/pokemon-logo.png" alt="" />
    </header>
    <nav>
        <div class="navbar-container">
            <div>
                <a class="nav-item" href="index.html">Inicio</a>
                <a class="nav-item" href="about.php">Sobre</a>
                <a class="nav-item" href="login.php">Login</a>
            </div>
            <a class="nav-item start-aventure" href="form.php">Inicie a sua aventura</a>
        </div>
    </nav>
    <main class="form">
        <h3>Login</h3>
        <form method="POST" action="home.php">
            <div class="form-group">
                <label for="name">Nome:<i class="fa fa-user" aria-hidden="true"></i></label>
                <input type="text" name="name" id="name" placeholder="Ash Ketchum" class="input-value" required />
            </div>

            <div class="form-group">
                <label for="senha">Senha:<i class="fa fa-user" aria-hidden="true"></i></label>
                <input type="password" name="senha" id="senha" placeholder="*****" class="input-value" required />
            </div>

            <div class="form-group form-button">
                <input type="submit" class="form-submit-send" value="Enviar" />
                <input type="reset" class="form-submit-reset" value="Limpar" />
            </div>
        </form>
    </main>
    <script src="./script/script.js"></script>
</body>

</html>