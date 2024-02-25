document.addEventListener("DOMContentLoaded", titleName);

// Fonction pour mettre à jour le titre du jeu.
function titleName() {
  // Récupère le nom du jeu depuis le localStorage.
  const gameName = localStorage.getItem('selectedGameName');
  
  // Si un nom de jeu est trouvé, met à jour le titre de la page.
  if (gameName) {
    document.querySelector('h1').textContent = decodeURIComponent(gameName);
  }
}