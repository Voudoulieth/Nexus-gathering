const carouselContent = document.getElementById("carousel-content");
let currentIndex = 0;

function updateCarousel() {
    const appRoot = document.getElementById('config').getAttribute('data-app-root'); // Assurez-vous que l'élément 'config' existe avec un attribut 'data-app-root'
    carouselContent.innerHTML = ''; // Efface le contenu actuel du carrousel

    // Boucle sur les données du carrousel pour créer les éléments HTML
    carouselData.forEach((item, index) => {
        let additionalAttributes = index === 2 ? ' id="imgspotlight"' : ''; // Spotlight pour l'élément central

        const aTag = `<a href="${appRoot}/jeu/${item.id_jeu}" class="carouselimg"${additionalAttributes}>
            <figure>
                <img src="${item.img_jeu}" alt="${item.nom_jeu}">
                <figcaption>${item.nom_jeu}</figcaption>
            </figure>
        </a>`;

        carouselContent.innerHTML += aTag;
    });

    attachClickEventToCarouselItems();
}

function attachClickEventToCarouselItems() {
    document.querySelectorAll('.carouselimg').forEach(item => {
        item.addEventListener('click', function(event) {
            localStorage.setItem('selectedGameId', item.querySelector('figure img').getAttribute('src'));
        });
    });
}

// Ajout des écouteurs pour les boutons de navigation, s'ils existent
document.getElementById('precedent')?.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + carouselData.length) % carouselData.length;
    updateCarousel();
});

document.getElementById('suivant')?.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % carouselData.length;
    updateCarousel();
});

// Initialisation du carrousel au chargement de la page
updateCarousel();



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