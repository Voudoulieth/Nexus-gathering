import { carouselData } from './data.js';

const carouselContent = document.getElementById("carousel-content");

// Initialisation de l'indice de l'élément actuellement affiché dans le carrousel à 0.
let currentIndex = 0;


 // Met à jour le contenu du carrousel avec de nouveaux éléments.
function updateCarousel() {
  // Effacement du contenu actuel du carrousel pour pouvoir afficher les nouveaux éléments.
  carouselContent.innerHTML = '';

  for (let i = 0; i < 5; i++) {
    let itemIndex = (currentIndex + i) % carouselData.length;
    // Récupération de l'élément à afficher à partir des données du carrousel.
    const item = carouselData[itemIndex];

    // Initialisation des attributs supplémentaires pour certains éléments, ici pour le troisième élément.
    let additionalAttributes = '';
    if (i === 2) {
      additionalAttributes = ' id="imgspotlight"'; // Attribution d'un id spécial pour le mettre en évidence.
    }

    // Construction du contenu HTML pour chaque élément du carrousel en utilisant les données de l'élément.
    const aTag = `<a href="${item.href}" class="carouselimg"${additionalAttributes} data-caption="${encodeURIComponent(item.caption)}">
      <figure>
        <img src="${item.src}" alt="${item.alt}">
        <figcaption>${item.caption}</figcaption>
      </figure>
    </a>`;

    // Ajout du contenu HTML généré au conteneur du carrousel.
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