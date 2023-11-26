<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("./db/dbConnect.php");

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    $pokemonName = $_POST["pokemonName"];
    $mestreId = $_POST["mestreId"];


    $sqlPokemon = "INSERT INTO pokemon (nome_pokemon, mestre_id) VALUES ('$pokemonName', '$mestreId')";

    if (mysqli_query($conn, $sqlPokemon)) {
        echo "Pokemon adicionado com sucesso!";
    } else {
        echo "Erro ao inserir Pokémon: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>