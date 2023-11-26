<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/home.css" />
    <title>Poke Academy</title>
</head>

<body>
    <header>
        <img src="./assets/pokemon-logo.png" alt="" />
    </header>
    <nav>
        <div class="navbar-container">
            <div>
                <a class="nav-item" href="index.php">Inicio</a>
                <a class="nav-item" href="about.php">Sobre</a>
                <a class="nav-item" href="login.php">Login</a>
            </div>
            <a class="nav-item start-aventure" href="form.html">Inicie a sua aventura</a>
        </div>
    </nav>
    <main class="main">

        <?php

        $nome = $senha = $nameData = $emailData = $contactData = $birthdateData = $sexo = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            include("./db/dbConnect.php");


            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }


            $nome = $_POST["name"];
            $senha = $_POST["senha"];


            $sql = "SELECT * FROM mestre WHERE nome = '$nome' AND senha = $senha LIMIT 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION['nameData'] = $row["nome"];
                $_SESSION['emailData'] = $row["email"];
                $_SESSION['contactData'] = $row["contato"];
                $_SESSION['birthdateData'] = $row["nascimento"];
                $_SESSION['sexo'] = $row["sexo"];
            } else {
                $row = $result->fetch_assoc();
                $_SESSION['nameData'] = '';
                $_SESSION['emailData'] = '';
                $_SESSION['contactData'] = '';
                $_SESSION['birthdateData'] = '';
                $_SESSION['sexo'] = $row["sexo"];
                echo "<h1>Login Invalido</h1>";
            }
            $conn->close();

        }

        ?>



        <?php if (isset($_SESSION['nameData'])): ?>
            <div class="person-box">



                <div class="person-data">
                    <div>
                        <span class="label">Nome:</span>
                        <span class="info" id="name-data">
                            <?php echo $_SESSION['nameData']; ?>
                        </span>
                    </div>
                    <div>
                        <span class="label">Email:</span>
                        <span class="info" id="email-data">
                            <?php echo $_SESSION['emailData']; ?>
                        </span>
                    </div>
                    <div>
                        <span class="label">Contato:</span>
                        <span class="info" id="contact-data">
                            <?php echo $_SESSION['contactData']; ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="pokemon-list"></div>

        <h3>Sua jornada começa agora!</h3>
        <div>
            <img class="gotta-logo" src="./assets/CATCHALL.png" alt="" />
        </div>
    </main>
    <script src="./script/formAction-script.js"></script>
</body>

</html>