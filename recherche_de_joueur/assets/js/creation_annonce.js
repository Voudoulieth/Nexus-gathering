import { validateInput, updateNumericValue } from './validation.js';

// Ajoute un écouteur pour valider le champ de description à chaque saisie
document.getElementById('textDesc').addEventListener('input', () => validateInput(document.getElementById('textDesc')));

// Controle de saisie de chaque champ avec la classe '.formNom' lors de la saisie
document.querySelectorAll('.formNom').forEach((inputElement) => {
    inputElement.addEventListener('input', () => validateInput(inputElement));
});

// Gestion des boutons pour incrémenter/décrémenter la valeur numérique du nombre de joueurs
const inputNumber = document.getElementById("nbjoueur");
document.querySelector('.control-up').addEventListener('click', () => updateNumericValue(inputNumber, true, 2, 64));
document.querySelector('.control-down').addEventListener('click', () => updateNumericValue(inputNumber, false, 2, 64));
inputNumber.addEventListener('input', () => updateNumericValue(inputNumber, undefined, 2, 64));

// Bascule l'affichage entre le formulaire et l'annonce
function toggleDisplay(showAnnonce) {
    const form = document.getElementById('form');
    const annonceDisplay = document.getElementById('annonceDisplay');

    // Affiche l'annonce si showAnnonce est vrai, sinon affiche le formulaire
    if (showAnnonce) {
        document.getElementById('h1').textContent = "Votre annonce";
        form.style.display = 'none';
        annonceDisplay.style.display = 'flex';
        // Mise à jour des informations de l'annonce avec les valeurs du formulaire
        document.getElementById('annonceTitle').textContent = document.querySelector('.formNom').value;
        document.getElementById('annonceGameName').textContent = document.getElementById('nom_du_jeu').value;
        document.getElementById('annoncePlayerCount').textContent = document.getElementById('nbjoueur').value;
        document.getElementById('annonceDescription').textContent = document.getElementById('textDesc').value;
    } else {
        document.getElementById('h1').textContent = "Création de l'annonce";
        form.style.display = 'flex';
        annonceDisplay.style.display = 'none';
    }
}

// Écouteurs pour afficher l'annonce ou revenir au formulaire
document.querySelector('#formBut .button').addEventListener('click', function() {
    toggleDisplay(true); // Passe en mode affichage de l'annonce
});
document.getElementById('editAnnonce').addEventListener('click', function() {
    toggleDisplay(false); // Passe en mode édition de l'annonce
});

// Gère l'affichage du placeholder en fonction de la présence de texte
function togglePlaceholderDisplay() {
    var placeholder = document.getElementById('placeholderText');
    placeholder.style.display = this.value ? 'none' : 'block';
}
document.getElementById('textDesc').addEventListener('input', togglePlaceholderDisplay);

// Réinitialise le formulaire et affiche à nouveau le placeholder
function resetForm() {
    document.querySelector('.formNom').value = '';
    document.getElementById('nom_du_jeu').value = '';
    document.getElementById('nbjoueur').value = '';
    document.getElementById('textDesc').value = '';
    document.getElementById('placeholderText').style.display = 'block';
}
document.getElementById('deleteAnnonce').addEventListener('click', resetForm);

// Enregistre l'annonce dans le localStorage
document.getElementById('publishAnnonce').addEventListener('click', enregistrerAnnonce);

function enregistrerAnnonce() {
    // Collecte les valeurs du formulaire
    const titre = document.querySelector('.formNom').value;
    const jeu = document.getElementById('nom_du_jeu').value;
    const nombreJoueurs = document.getElementById('nbjoueur').value;
    const description = document.getElementById('textDesc').value;
    // Crée une nouvelle annonce et l'ajoute au localStorage
    const annonce = { titre, jeu, nombreJoueurs, description };
    const annonces = JSON.parse(localStorage.getItem('annonces')) || [];
    annonces.push(annonce);
    localStorage.setItem('annonces', JSON.stringify(annonces));
}
