document.addEventListener("DOMContentLoaded", function() {
  const gameName = localStorage.getItem('selectedGameName'); // Ou sessionStorage selon ce que vous avez choisi
  if (gameName) {
    document.querySelector('h1').textContent = decodeURIComponent(gameName);
  }
});