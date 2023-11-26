<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css" />
  <title>Poke Academy</title>
</head>

<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("./db/dbConnect.php");

    if (!$conn) {
      die("Conexão falhou: " . mysqli_connect_error());
    }

    $nome = $_POST["name"];
    $email = $_POST["email"];
    $contato = $_POST["celular"];
    $sexo = $_POST["sexo"];
    $nascimento = $_POST["nascimento"];
    $senha = $_POST["senha"];
    $pokemon = $_POST["pokemon"];


    $sqlMestre = "INSERT INTO mestre (nome, email, contato, sexo, nascimento, senha) VALUES ('$nome', '$email', '$contato', '$sexo', '$nascimento', '$senha')";

    if (mysqli_query($conn, $sqlMestre)) {

      $mestreId = mysqli_insert_id($conn);


      $sqlPokemon = "INSERT INTO pokemon (nome_pokemon, mestre_id) VALUES ('$pokemon', $mestreId)";

      if (mysqli_query($conn, $sqlPokemon)) {

      } else {
        echo "Erro ao inserir Pokémon: " . mysqli_error($conn);
      }
    } else {
      echo "Erro ao inserir mestre: " . mysqli_error($conn);
    }

    mysqli_close($conn);
  }
  ?>


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
    <div class="person-box">
      <?php
      $nome = $_POST["name"];
      $email = $_POST["email"];
      $contato = $_POST["celular"];
      $sexo = $_POST["sexo"];
      $nascimento = $_POST["nascimento"];
      ?>
      <div>
        <div class="pokemon-card" id="charmander"></div>
      </div>
      <div class="person-img">
        <img src="./assets/<?php echo $sexo; ?>.png" id="person" class="person" alt="" />
      </div>

      <div class="person-data">

        <div>
          <span class="label">Nome:</span>
          <span class="info" id="name-data">
            <?php echo $nome; ?>
          </span>
        </div>
        <div>
          <span class="label">Email:</span>
          <span class="info" id="email-data">
            <?php echo $email; ?>
          </span>
        </div>
        <div>
          <span class="label">Contato:</span>
          <span class="info" id="contact-data">
            <?php echo $contato; ?>
          </span>
        </div>
        <div>
          <span class="label">Idade:</span>
          <span class="info" id="age-data">
            <?php
            $dataNascimento = new DateTime($nascimento);
            $hoje = new DateTime();
            $idade = $hoje->diff($dataNascimento)->y;
            echo $idade;
            ?>
          </span>
        </div>
      </div>

    </div>

    <h3>Sua jornada começa agora!</h3>
    <div>
      <img class="gotta-logo" src="./assets/CATCHALL.png" alt="" />
    </div>
  </main>
  <script src="./script/formAction-script.js"></script>
</body>

</html>