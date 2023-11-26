const getParameterByName = name => {
    const url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)");
    const results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  };
  
  
  const calculateAge = dateOfBirth => {
    const dateOfBirthArray = dateOfBirth.split('-');
    const birthYear = parseInt(dateOfBirthArray[0]);
    const birthMonth = parseInt(dateOfBirthArray[1]);
    const birthDay = parseInt(dateOfBirthArray[2]);
  
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();
    const currentMonth = currentDate.getMonth() + 1;
    const currentDay = currentDate.getDate();
  
    let age = currentYear - birthYear;
  
    if (currentMonth < birthMonth || (currentMonth === birthMonth && currentDay < birthDay)) {
      age--;
    }
  
    return age;
  };
  
    
    let userName = getParameterByName("name");
    let email = getParameterByName("email");
    let contact = getParameterByName("celular");
    let birthDay = getParameterByName("nascimento")
    let sex = getParameterByName("sexo");
  
    const requestPokemon = async (pokemonName) => {
      const url = `https://pokeapi.co/api/v2/pokemon/${pokemonName}`;
      try {
        const response = await fetch(url);
        if (!response.ok) {
          throw new Error(`Erro na requisição: ${response.status}`);
        }
        const data = await response.json();
        return {
          id: data.id,
          name: data.name,
          sprite: data.sprites.other["official-artwork"].front_default,
          type: data.types[0].type.name
        };
      } catch (error) {
        console.error('Erro durante a requisição:', error);
      }
    }
  

    function adicionarPokemon(mestreId) {
        const pokemonName = document.getElementById("pokemonName").value;
    
        if (pokemonName.trim() === "") {
            alert("Por favor, insira o nome do Pokemon.");
            return;
        }
    
        const xhrCheckPokemon = new XMLHttpRequest();
    
        // Endpoint da API do Pokémon para verificar a existência do Pokémon
        const pokemonApiEndpoint = "https://pokeapi.co/api/v2/pokemon/";
    
        xhrCheckPokemon.open("GET", pokemonApiEndpoint + pokemonName.toLowerCase(), true);
    
        xhrCheckPokemon.onreadystatechange = function () {
            if (xhrCheckPokemon.readyState == 4) {
                if (xhrCheckPokemon.status == 200) {
                    // Pokémon encontrado na API, agora você pode adicionar ao banco de dados
                    const xhrAddPokemon = new XMLHttpRequest();
    
                    xhrAddPokemon.open("POST", "adicionar_pokemon.php", true);
                    xhrAddPokemon.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
                    xhrAddPokemon.onreadystatechange = function () {
                        if (xhrAddPokemon.readyState == 4 && xhrAddPokemon.status == 200) {
                            alert(xhrAddPokemon.responseText);
    
                            // Recarregar a página após adicionar com sucesso
                            location.reload();
                        }
                    };
    
                    // Envie também o mestreId para o servidor
                    xhrAddPokemon.send("pokemonName=" + pokemonName + "&mestreId=" + mestreId);
                } else {
                    alert("Pokemon não encontrado na API.");
                }
            }
        };
    
        // Enviar solicitação para verificar a existência do Pokémon
        xhrCheckPokemon.send();
    }
    
    


function excluirPokemon(pokemonName) {
    console.log(pokemonName)
    if (confirm("Tem certeza de que deseja excluir este Pokémon?")) {
        const xhrExcluirPokemon = new XMLHttpRequest();

        xhrExcluirPokemon.open("POST", "excluir_pokemon.php", true);
        xhrExcluirPokemon.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhrExcluirPokemon.onreadystatechange = function () {
            if (xhrExcluirPokemon.readyState == 4 && xhrExcluirPokemon.status == 200) {
                alert(xhrExcluirPokemon.responseText);

        
                location.reload();
            }
        };


        xhrExcluirPokemon.send("pokemonName=" + encodeURIComponent(pokemonName));
    }
}



    

    document.addEventListener('DOMContentLoaded', async function () {

    });  
    
    
    
    
    