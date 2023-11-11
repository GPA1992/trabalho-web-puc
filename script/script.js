function mascaraTelefone(event) {
    let tecla = event.key;
    let telefone = event.target.value.replace(/\D+/g, "");

    if (/^[0-9]$/i.test(tecla)) {
      telefone = telefone + tecla;
      let tamanho = telefone.length;
  
      if (tamanho >= 12) {
        return false;
      }
  
      if (tamanho > 10) { 
        telefone = telefone.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
      } else if (tamanho > 5) { 
        telefone = telefone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
      } else if (tamanho > 2) { 
        telefone = telefone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
      } else {
        telefone = telefone.replace(/^(\d*)/, "($1");
      }
  
      event.target.value = telefone;
    }
  
    if (!["Backspace", "Delete", "Tab"].includes(tecla)) {
      return false;
    }
  }



function mostrarModal() {
  const modal = document.getElementById("modal");
  modal.style.display = "block";
}


function fecharModal() {
  const modal = document.getElementById("modal");
  modal.style.display = "none";
}


async function requestPokemon(pokemonName) {
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


const selectPokemon = () => {
  const pokemonCards = document.querySelectorAll('.pokemon-card');

  pokemonCards.forEach(function (card) {
    card.addEventListener('click', function () {
      pokemonCards.forEach(function (otherCard) {
        otherCard.classList.remove('selected');
      });

      card.classList.add('selected');
      const selected = document.getElementsByClassName('selected');
      localStorage.clear()
      localStorage.setItem('selectedPokemonId', selected[0].id);
    });
  });
}


const createPokemonCard = async (pokemonId) => {
  const pokemon = await requestPokemon(pokemonId);
  const pokemonCard = document.getElementById(pokemon.name);
  const pokemonImage = document.createElement('img');
    pokemonImage.classList.add('pokemon-image');
    pokemonImage.src = pokemon.sprite
    pokemonCard.appendChild(pokemonImage)
  const pokemonName = document.createElement('p');
    pokemonName.classList.add('pokemon-name');
    pokemonName.innerText = pokemon.name;
    pokemonCard.appendChild(pokemonName)
}

document.addEventListener('DOMContentLoaded', async function () {
  await createPokemonCard(4)
  await createPokemonCard(1)
  await createPokemonCard(7)
  selectPokemon()
});  
