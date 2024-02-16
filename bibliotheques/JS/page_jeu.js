// Sélection du bouton "Modifier"
const Modifier = document.querySelector('button[name="button"]');
// Sélection du bouton "Valider"
const Valider = document.querySelector('button[name="submit"]');
// Sélection page du jeu
const PageJeu = document.querySelector('#pageJeu');
// Sélection formulaire
const AjoutJeu = document.querySelector('#ajoutJeu');

// Ajout d'un écouteur d'événement pour le clic sur le bouton "Modifier"
Modifier.addEventListener('click', () => {
    // Affichage
    Valider.style.display = 'block';
    AjoutJeu.style.display = 'block';
    // Masquage
    Modifier.style.display = 'none';
    PageJeu.style.display = 'none';
});


const supprimer = document.getElementById("supprimerContenu")

supprimer.addEventListener("click", function() {
    const confirmation = confirm("Êtes-vous sûr de vouloir supprimer le contenu de la page ?");
    if (confirmation) {
    const contenu = document.getElementById("contenu");
        contenu.remove();
    }
});