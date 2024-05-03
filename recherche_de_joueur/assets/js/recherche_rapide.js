import { carouselData } from './data.js';

const carouselContent = document.getElementById("carousel-content");

// Initialisation de l'indice de l'élément actuellement affiché dans le carrousel à 0.
let currentIndex = 0;


 // Met à jour le contenu du carrousel avec de nouveaux éléments.
 function updateCarousel() {
  const appRoot = document.getElementById('config').getAttribute('data-app-root'); // Récupérer APP_ROOT

  // Effacement du contenu actuel du carrousel pour pouvoir afficher les nouveaux éléments.
  carouselContent.innerHTML = '';

  for (let i = 0; i < 5; i++) {
    let itemIndex = (currentIndex + i) % carouselData.length;
    const item = carouselData[itemIndex];  // Récupération de l'élément à afficher.

    let additionalAttributes = '';
    if (i === 2) {
      additionalAttributes = ' id="imgspotlight"';
    }

    // Utilisation de APP_ROOT dans l'URL
    const aTag = `<a href="${appRoot}${item.href}" class="carouselimg"${additionalAttributes} data-caption="${encodeURIComponent(item.caption)}">
      <figure>
        <img src="${item.src}" alt="${item.alt}">
        <figcaption>${item.caption}</figcaption>
      </figure>
    </a>`;

    carouselContent.innerHTML += aTag;
  }
  attachClickEventToCarouselItems();
}


 // Permet de naviguer vers l'élément précédent du carrousel.
function navigateToPrevious() {
  // Mise à jour de l'indice pour pointer vers l'élément précédent et mise à jour du contenu du carrousel.
  currentIndex = (currentIndex - 1 + carouselData.length) % carouselData.length;
  updateCarousel();
}

 // Permet de naviguer vers l'élément suivant du carrousel.
function navigateToNext() {
  // Mise à jour de l'indice pour pointer vers l'élément suivant et mise à jour du contenu du carrousel.
  currentIndex = (currentIndex + 1) % carouselData.length;
  updateCarousel();
}


 // Associe des écouteurs d'événements de clic aux images du carrousel.
function attachClickEventToCarouselItems() {
  document.querySelectorAll('.carouselimg').forEach(item => {
    item.removeEventListener('click', handleCarouselItemClick);
    item.addEventListener('click', handleCarouselItemClick);
  });
}

// récupération du nom du jeu pour l'affiché sur la page suivante
function handleCarouselItemClick(e) {
  // Récupération de la légende (caption) de l'élément cliqué.
  const caption = decodeURIComponent(e.currentTarget.getAttribute('data-caption'));
  // Stockage de la légende dans le localStorage pour une utilisation ultérieure.
  localStorage.setItem('selectedGameName', caption);
}

document.getElementById('precedent').addEventListener('click', navigateToPrevious);
document.getElementById('suivant').addEventListener('click', navigateToNext);

// Initialisation du carrousel au chargement de la page.
updateCarousel();