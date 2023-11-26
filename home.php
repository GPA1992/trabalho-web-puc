<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/home.css" />
    <title>Poke Academy</title>
</head>

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
        $mestre_id = $row["id"];
        $sql_pokemon = "SELECT * FROM pokemon WHERE mestre_id = $mestre_id";
        $result_pokemon = $conn->query($sql_pokemon);
    } else {
        $row = $result->fetch_assoc();
        $_SESSION['nameData'] = '';
        $_SESSION['emailData'] = '';
        $_SESSION['contactData'] = '';
        $_SESSION['birthdateData'] = '';
        $_SESSION['sexo'] = $row["sexo"];
        echo "<h1>Login Invalido</h1>";
    }


}

?>

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
            <a class="nav-item start-aventure" href="form.php">Inicie a sua aventura</a>
        </div>
    </nav>
    <main class="main">
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

        <label for="pokemonName" id="new-pokemon-name">Nome do novo pokemon</label>
        <input type="text" id="pokemonName">
        <button id="new-pokemon-btn" onclick="adicionarPokemon(<?php echo $mestre_id; ?>)">Adicionar Pokemon</button>

        <?php
        $sql_pokemon = "SELECT * FROM pokemon WHERE mestre_id = $mestre_id";
        $result_pokemon = $conn->query($sql_pokemon);

        if ($result_pokemon->num_rows > 0) {
            echo "<div class='pokemon-list'>";
            while ($row_pokemon = $result_pokemon->fetch_assoc()) {
                $pokemon_name = $row_pokemon['nome_pokemon'];


                $pokeapi_url = "https://pokeapi.co/api/v2/pokemon/{$pokemon_name}";
                $pokemon_data_json = file_get_contents($pokeapi_url);
                $pokemon_data = json_decode($pokemon_data_json, true);


                if ($pokemon_data && !empty($pokemon_data)) {
                    echo '<div class="pokemon-card">';
                    if (isset($pokemon_data['sprites']['other']['official-artwork']['front_default'])) {
                        $pokemon_image_url = $pokemon_data['sprites']['other']['official-artwork']['front_default'];
                        echo "<img src='{$pokemon_image_url}' alt='{$pokemon_name}' class='pokemon-image' />";
                        echo "<button id='delete-pokemon' onclick=\"excluirPokemon(encodeURIComponent('$pokemon_name'))\">Excluir</button>";

                    } else {
                        echo "<p>Imagem não encontrada para {$pokemon_name}</p>";
                    }
                    echo "<p class='pokemon-name'>{$pokemon_data['name']}</p>";
                    echo "</div>";
                } else {
                    echo "<p>Falha ao obter dados do Pokémon {$pokemon_name} da PokeAPI.</p>";
                }
            }
            echo "</div>";
        } else {
            echo "<p>Sem pokémons encontrados para este mestre.</p>";
        }
        ?>
        <div>
            <img class="gotta-logo" src="./assets/CATCHALL.png" alt="" />
        </div>
    </main>
    <script src="./script/home.js"></script>
</body>

</html>