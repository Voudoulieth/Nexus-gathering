// Importez les fonctions de validations.js
import { validateInput, updateNumericValue } from './validation.js';

// Utilisez validateInput et updateNumericValue là où c'est nécessaire
document.getElementById('textDesc').addEventListener('input', () => validateInput(document.getElementById('textDesc')));
document.querySelectorAll('.formNom').forEach((inputElement) => {
    inputElement.addEventListener('input', () => validateInput(inputElement));
});


const inputNumber = document.getElementById("nbjoueur");
document.querySelector('.control-up').addEventListener('click', () => updateNumericValue(inputNumber, true, 2, 64));
document.querySelector('.control-down').addEventListener('click', () => updateNumericValue(inputNumber, false, 2, 64));
inputNumber.addEventListener('input', () => updateNumericValue(inputNumber, undefined, 2, 64));


// Fonction pour basculer l'affichage du formulaire et de l'annonce
function toggleDisplay(showAnnonce) {
    const form = document.getElementById('form');
    const annonceDisplay = document.getElementById('annonceDisplay');

    if (showAnnonce) {
        document.getElementById('h1').textContent = "Votre annonce"
        form.style.display = 'none';
        annonceDisplay.style.display = 'flex';
        document.getElementById('annonceTitle').textContent = document.querySelector('.formNom').value;
        document.getElementById('annonceGameName').textContent = document.getElementById('nom_du_jeu').value;
        document.getElementById('annoncePlayerCount').textContent = document.getElementById('nbjoueur').value;
        document.getElementById('annonceDescription').textContent = document.getElementById('textDesc').value;
    } else {
        document.getElementById('h1').textContent = "Création de l'annonce"
        form.style.display = 'flex';
        annonceDisplay.style.display = 'none';
    }
}

document.querySelector('#formBut .button').addEventListener('click', function() {
    toggleDisplay(true); // Affiche l'annonce
});
document.getElementById('editAnnonce').addEventListener('click', function() {
    toggleDisplay(false); // Affiche le formulaire
});


// Fonction pour basculer l'affichage du placeholder
function togglePlaceholderDisplay() {
    var placeholder = document.getElementById('placeholderText');
    if (this.value) {
        placeholder.style.display = 'none';
    } else {
        placeholder.style.display = 'block';
    }
}
document.getElementById('textDesc').addEventListener('input', togglePlaceholderDisplay);


function resetForm() {
    // Réinitialiser les valeurs des champs
    document.querySelector('.formNom').value = '';
    document.getElementById('nom_du_jeu').value = '';
    document.getElementById('nbjoueur').value = '';
    document.getElementById('textDesc').value = '';

    // Réaffiche le placeholder si masqué
    document.getElementById('placeholderText').style.display = 'block';
}
document.getElementById('deleteAnnonce').addEventListener('click', resetForm);


document.getElementById('publishAnnonce').addEventListener('click', enregistrerAnnonce);

function enregistrerAnnonce() {
    // Récupération des valeurs du formulaire
    const titre = document.querySelector('.formNom').value;
    const jeu = document.getElementById('nom_du_jeu').value;
    const nombreJoueurs = document.getElementById('nbjoueur').value;
    const description = document.getElementById('textDesc').value;
    // Création de l'objet annonce
    const annonce = { titre, jeu, nombreJoueurs, description };
    // Récupération des annonces existantes et ajout de la nouvelle annonce
    const annonces = JSON.parse(localStorage.getItem('annonces')) || [];
    annonces.push(annonce);
    // Sauvegarde des annonces dans localStorage
    localStorage.setItem('annonces', JSON.stringify(annonces));
}