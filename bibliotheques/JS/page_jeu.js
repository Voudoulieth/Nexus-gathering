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
const APP_ROOT = 'http://localhost:3000/src/';


supprimer.addEventListener("click", function() {
    const confirmation = confirm("Êtes-vous sûr de vouloir supprimer le contenu de la page ?");
    if (confirmation) {
        // Suppression du contenu de l'élément avec id "contenu"
        const contenu = document.getElementById("contenu");
        if (contenu) {
            contenu.remove();
        }
        // Redirection vers la page /bibliotheque-generale
        window.location.href = APP_ROOT + 'bibliotheque-generale';
    }
});