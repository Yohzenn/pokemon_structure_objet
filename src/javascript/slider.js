document.addEventListener("DOMContentLoaded", () => {
  const swiper = new Swiper(".swiper", {
    slidesPerView: 3,
    centeredSlides: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  // Écouter l'événement de changement de slide
  swiper.on("slideChange", () => {
    const activeIndex = swiper.realIndex; // Index réel de la slide active
    const activeSlide = swiper.slides[activeIndex]; // Élément de la slide active
    const pokemonId = activeSlide.querySelector("#id_pokemon").value; // ID du Pokémon
    console.log("Slide active:", activeIndex, "ID Pokémon:", pokemonId);

    // Optionnel : Envoyer l'information à PHP via une requête fetch
    fetch(`update_active_slide.php?pokemon_id=${pokemonId}`)
      .then((response) => response.text())
      .then((data) => {
        console.log("Réponse serveur:", data);
      })
      .catch((error) => console.error("Erreur:", error));
  });
});
