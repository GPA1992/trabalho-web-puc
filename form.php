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
        <a class="nav-item" href="index.php">Inicio</a>
        <a class="nav-item" href="about.php">Sobre</a>
        <a class="nav-item" href="login.php">Login</a>
      </div>
      <a class="nav-item start-aventure" href="form.php">Inicie a sua aventura</a>
    </div>
  </nav>
  <main class="form">
    <h3>Cadastro</h3>
    <form method="POST" action="formAction.php">
      <div class="form-group">
        <label for="name">Nome:<i class="fa fa-user" aria-hidden="true"></i></label>
        <input type="text" name="name" id="name" placeholder="Ash Ketchum" class="input-value" required />
      </div>

      <div class="form-group">
        <label for="senha">Senha:<i class="fa fa-user" aria-hidden="true"></i></label>
        <input type="password" name="senha" id="senha" placeholder="*****" class="input-value" required />
      </div>

      <div class="form-group">
        <label for="email">Email:<i class="fa fa-envelope" aria-hidden="true"></i></label>
        <input type="email" name="email" class="input-value" id="email" placeholder="ash_mestre_pokemon_2006@gmail.com"
          required />
      </div>

      <div class="form-group">
        <label for="celular">Contato:<i class="fa fa-phone" aria-hidden="true"></i></label>
        <input type="phone" name="celular" id="celular" class="input-value" pattern="\(\d{2}\)\s\d{4,5}-\d{4}$"
          onkeydown="return mascaraTelefone(event)" placeholder="(51) - 29564-9987" title="(xx) xxxxx-xxxx" required />
      </div>

      <div class="form-group">
        <label for="sexo">Sexo:</label>
        <div class="radio-group">
          <div>
            <input type="radio" name="sexo" id="masculino" value="Masculino" required />
            <label for="masculino">Masculino</label>
          </div>

          <div>
            <input type="radio" name="sexo" id="feminino" value="Feminino" />
            <label for="feminino">Feminino</label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="dt_nasc">Data de Nascimento:<i class="fa fa-birthday-cake" aria-hidden="true"></i></label>
        <input type="date" class="input-value" name="nascimento" id="dt_nasc" title="Data de Nascimento" required />
      </div>

      <!--    <div class="pokemon-box">
        <div class="pokemon-card" id="charmander"></div>
        <div class="pokemon-card" id="squirtle"></div>
        <div class="pokemon-card" id="bulbasaur"></div>
      </div> -->

      <div class="pokemon-box">
        <label>
          <div class="pokemon-card" id="charmander"></div>
          <input type="radio" name="pokemon" id="charmander" value="charmander">

        </label>

        <label>
          <div class="pokemon-card" id="squirtle"></div>
          <input type="radio" name="pokemon" id="squirtle" value="squirtle">

        </label>

        <label>
          <div class="pokemon-card" id="bulbasaur"></div>
          <input type="radio" name="pokemon" id="bulbasaur" value="bulbasaur">
        </label>
      </div>


      <div id="modal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="fecharModal()">&times;</span>
          <p>
            Ao aceitar os termos, você concorda que durante a sua jornada você
            pode:
          </p>
          <ol>
            <li>
              Ser acordado por um Jigglypuff cantando na sua tenda no meio da
              noite.
            </li>
            <li>
              Tomar choque de um Pikachu teimoso enquanto tenta capturá-lo.
            </li>
            <li>
              Ter seu boné roubado por um travesso Meowth da Equipe Rocket.
            </li>
            <li>
              Perder a conta de quantas vezes um Magikarp pulou inutilmente.
            </li>
            <li>
              Se perder na Floresta de Viridian e ser guiado por um Weedle
              perdido.
            </li>
            <li>Ser confundido por um Ditto que se transformou em você.</li>
            <li>
              Ficar paralisado por um golpe do Thunder Wave de um Raichu
              selvagem.
            </li>
            <li>
              Ter um Charmander espirrando fogo enquanto brinca com ele.
            </li>
            <li>Ter sua comida roubada por um faminto Snorlax dorminhoco.</li>
            <li>
              Receber um abraço caloroso (literalmente) de um Magmar durante
              um encontro inesperado.
            </li>
          </ol>
        </div>
      </div>

      <div class="term-box">
        <label class="label-agree-term">
          Eu concordo com os
          <span class="term-service" onclick="mostrarModal()">termos de serviço</span>
        </label>
        <input type="checkbox" name="agree-term" id="agree-term" required />
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