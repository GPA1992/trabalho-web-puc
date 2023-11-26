<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pokemonName"])) {
    include("./db/dbConnect.php");

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    $pokemonName = $_POST["pokemonName"];

    $pokemonName = mysqli_real_escape_string($conn, $pokemonName);

    $sqlExcluirPokemon = "DELETE FROM pokemon WHERE nome_pokemon = '$pokemonName'";

    if (mysqli_query($conn, $sqlExcluirPokemon)) {
        echo "Pokemon excluído com sucesso!";
    } else {
        echo "Erro ao excluir Pokémon: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Nome do Pokémon não especificado.";
}
?>