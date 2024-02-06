// recherche_rapide.js
import { carouselData } from './data.js'; // Assurez-vous que le chemin vers data.js est correct

const carouselContent = document.getElementById("carousel-content"); // Conteneur pour le contenu dynamique
let currentIndex = 0; // Commencez par le premier élément du tableau

function updateCarousel() {
    carouselContent.innerHTML = ''; // Efface le contenu précédent du carrousel
  
    for (let i = 0; i < 5; i++) {
      let itemIndex = (currentIndex + i) % carouselData.length; // Calcule l'index correct, permettant de boucler sur le tableau des données
      const item = carouselData[itemIndex];
  
      // Détermine si l'élément actuel est le deuxième de la boucle
      let additionalAttributes = '';
      if (i === 2) { // Le deuxième élément a un index de 1 (0-based index)
        additionalAttributes = ' id="imgspotlight"'; // Remplacez 'specialId' par l'identifiant que vous souhaitez ajouter
      }
  
      // Génère le contenu de l'élément avec l'id supplémentaire si nécessaire
      const aTag = `<a href="${item.href}" class="carouselimg"${additionalAttributes}>
        <figure>
          <img src="${item.src}" alt="${item.alt}">
          <figcaption>${item.caption}</figcaption>
        </figure>
      </a>`;
  
      // Ajoutez le contenu généré au carrousel
      carouselContent.innerHTML += aTag;
    }
  }

// Ajoutez des écouteurs d'événements sur les boutons pour naviguer dans le carrousel
document.getElementById('suivant').addEventListener('click', function() {
  currentIndex = (currentIndex + 1) % carouselData.length; // Incrémente l'index actuel
  updateCarousel();
});

document.getElementById('precedent').addEventListener('click', function() {
  currentIndex = (currentIndex - 1 + carouselData.length) % carouselData.length; // Décrémente l'index actuel
  updateCarousel();
});

// Initialisez le carrousel au chargement
updateCarousel();
