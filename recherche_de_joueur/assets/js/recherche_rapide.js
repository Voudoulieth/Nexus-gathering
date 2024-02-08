import { carouselData } from './data.js';

const carouselContent = document.getElementById("carousel-content"); // Conteneur pour le contenu dynamique
let currentIndex = 0; 

function updateCarousel() {
    carouselContent.innerHTML = ''; // Efface le contenu précédent du carrousel
  
    for (let i = 0; i < 5; i++) {
      let itemIndex = (currentIndex + i) % carouselData.length; // Calcule l'index correct, permettant de boucler sur le tableau des données
      const item = carouselData[itemIndex];
  
      // Détermine si l'élément actuel est le deuxième de la boucle
      let additionalAttributes = '';
      if (i === 2) { // Le deuxième élément a un index de 1 (0-based index)
        additionalAttributes = ' id="imgspotlight"';
      }
  
      // Génère le contenu de l'élément
      const aTag = `<a href="${item.href}" class="carouselimg"${additionalAttributes} data-caption="${encodeURIComponent(item.caption)}">
      <figure>
        <img src="${item.src}" alt="${item.alt}">
        <figcaption>${item.caption}</figcaption>
      </figure>
    </a>`;
  
  
      carouselContent.innerHTML += aTag;
    }
  }

document.getElementById('suivant').addEventListener('click', function() {
  currentIndex = (currentIndex + 1) % carouselData.length; // Incrémente l'index actuel
  updateCarousel();
});

document.getElementById('precedent').addEventListener('click', function() {
  currentIndex = (currentIndex - 1 + carouselData.length) % carouselData.length; // Décrémente l'index actuel
  updateCarousel();
});

// Initialise le carrousel au chargement
updateCarousel();

document.querySelectorAll('.carouselimg').forEach(item => {
  item.addEventListener('click', function(e) {
    const caption = e.currentTarget.getAttribute('data-caption');
    localStorage.setItem('selectedGameName', caption); // Utilisez sessionStorage si vous préférez
  });
});
