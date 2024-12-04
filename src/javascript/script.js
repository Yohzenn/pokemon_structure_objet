document.addEventListener("DOMContentLoaded", () => {
  const pokemonSelect = document.getElementById("pokemon_select");

  const fetchPokemon = async (pokemon) => {
    const repsonse = await fetch(
      `https://pokeapi.co/api/v2/pokemon/${pokemon.getAttribute("data-name")}`
    );

    const data = await repsonse.json();

    return data;
  };

  const updatePokemonDetails = async () => {
    const data = await fetchPokemon(selectedOption);
    if (selectedOption) {
      const name = selectedOption.getAttribute("data-name");
      const type = selectedOption.getAttribute("data-type");
      const pv = selectedOption.getAttribute("data-pv");
      const attaque = selectedOption.getAttribute("data-attaque");
      const defense = selectedOption.getAttribute("data-defense");

      document.getElementById("pokemon-name").innerHTML = `Nom: ${name}`;
      document.getElementById("info").innerHTML = ``;
      document.getElementById("pokemon-type").innerHTML = `Type: ${type}`;
      document.getElementById("pokemon-pv").innerHTML = `Point de vie: ${pv}`;
      document.getElementById(
        "pokemon-attaque"
      ).innerHTML = `Attaque: ${attaque}`;
      document.getElementById(
        "pokemon-defense"
      ).innerHTML = `Défense: ${defense}`;
      document.getElementById("pokemon-image").src = data.sprites.front_default;
    }
  };
});
