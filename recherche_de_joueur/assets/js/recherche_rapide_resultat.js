document.addEventListener("DOMContentLoaded", titleName()) 
function titleName(){
  const gameName = localStorage.getItem('selectedGameName'); // Ou sessionStorage selon ce que vous avez choisi
  if (gameName) {
    document.querySelector('h1').textContent = decodeURIComponent(gameName);
  }
};