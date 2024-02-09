// Importe les données du carrousel depuis un fichier externe
import { carouselData } from './data.js';

// Sélectionne le conteneur du contenu du carrousel
const carouselContent = document.getElementById("carousel-content");
// Initialise l'index actuel à 0 pour démarrer à partir du premier élément
let currentIndex = 0;

/**
 * Met à jour le contenu affiché dans le carrousel.
 */
function updateCarousel() {
  // Efface le contenu précédent du conteneur du carrousel
  carouselContent.innerHTML = '';

  // Boucle pour générer et afficher les 5 prochains éléments du carrousel
  for (let i = 0; i < 5; i++) {
    // Calcule l'index de l'élément à afficher, en bouclant sur le tableau si nécessaire
    let itemIndex = (currentIndex + i) % carouselData.length;
    const item = carouselData[itemIndex];

    // Détermine si l'élément actuel doit avoir des attributs supplémentaires (pour le spotlight)
    let additionalAttributes = '';
    if (i === 2) { // Si c'est le troisième élément, lui assigne un id spécial
      additionalAttributes = ' id="imgspotlight"';
    }

    // Construit le contenu HTML pour l'élément du carrousel
    const aTag = `<a href="${item.href}" class="carouselimg"${additionalAttributes} data-caption="${encodeURIComponent(item.caption)}">
    <figure>
      <img src="${item.src}" alt="${item.alt}">
      <figcaption>${item.caption}</figcaption>
    </figure>
  </a>`;

    // Ajoute l'élément généré au conteneur du carrousel
    carouselContent.innerHTML += aTag;
  }

  // Attache les événements click à chaque nouvel élément du carrousel
  attachClickEventToCarouselItems();
}

/**
 * Fonction pour naviguer vers l'élément précédent du carrousel.
 */
function navigateToPrevious() {
  // Décrémente l'index actuel et met à jour le carrousel
  currentIndex = (currentIndex + 1) % carouselData.length;
  updateCarousel();
}

/**
 * Fonction pour naviguer vers l'élément suivant du carrousel.
 */
function navigateToNext() {
  // Incrémente l'index actuel et met à jour le carrousel
  currentIndex = (currentIndex - 1 + carouselData.length) % carouselData.length;
  updateCarousel();
}

/**
 * Attache un écouteur d'événements à chaque image du carrousel pour gérer les clics.
 */
function attachClickEventToCarouselItems() {
  document.querySelectorAll('.carouselimg').forEach(item => {
    item.removeEventListener('click', handleCarouselItemClick); // Assure la suppression de l'écouteur précédent pour éviter les doublons
    item.addEventListener('click', handleCarouselItemClick); // Attache le gestionnaire d'événements
  });
}

/**
 * Gestionnaire d'événements pour les clics sur les images du carrousel.
 * Stocke le nom du jeu sélectionné dans le localStorage.
 * 
 * @param {Event} e - L'événement du clic
 */
function handleCarouselItemClick(e) {
  // Récupère la légende associée à l'image cliquée
  const caption = e.currentTarget.getAttribute('data-caption');
  // Stocke la légende dans le localStorage sous la clé 'selectedGameName'
  localStorage.setItem('selectedGameName', caption);
}

// Attache les gestionnaires d'événements aux boutons de navigation 'précédent' et 'suivant'
document.getElementById('precedent').addEventListener('click', navigateToPrevious);
document.getElementById('suivant').addEventListener('click', navigateToNext);

// Initialise le carrousel au chargement de la page
updateCarousel();
