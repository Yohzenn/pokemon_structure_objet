document.addEventListener("DOMContentLoaded", () => {
  const swiper = new Swiper(".swiper", {
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 80,
    setWrapperSize: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  // Ajouter une classe spéciale à la slide centrale
  const updateActiveSlide = () => {
    const slides = swiper.slides;
    slides.forEach((slide) => slide.classList.remove("active-slide"));
    slides.forEach((slide) => (slide.style.transform = ""));
    const activeSlide = slides[swiper.activeIndex];
    if (activeSlide) {
      activeSlide.classList.add("active-slide"); // Ajouter la classe à la slide centrale
      document.querySelector(".active-slide").style.transform = "scale(1.2)";
      document.getElementById("pokemon_select_hidden").value =
        activeSlide.querySelector("#id_pokemon").value;
        
      while (
        document.getElementById("pokemon_select_hidden").value ==
        document.getElementById("pokemon2_select").value
      ) {
        document.getElementById("pokemon2_select").value = Math.floor(
          Math.random() * 7
        );
      }
    }
  };

  // Mettre à jour la classe après le chargement initial
  updateActiveSlide();

  // Mettre à jour la classe à chaque changement de slide
  swiper.on("slideChange", updateActiveSlide);
});
