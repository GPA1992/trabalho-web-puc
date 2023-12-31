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

  document.addEventListener('DOMContentLoaded', async function () {
    const pokemonName = localStorage.getItem('selectedPokemonId');
    const pokemon = await requestPokemon(pokemonName)
    const card = document.getElementsByClassName('pokemon-card')[0];
    const pokemonImage = document.createElement('img');
    pokemonImage.classList.add('pokemon-image');
    pokemonImage.src = pokemon.sprite
    card.appendChild(pokemonImage)
  });  
  
  
  
  
  