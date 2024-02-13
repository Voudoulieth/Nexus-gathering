// Fonction pour basculer l'affichage du formulaire et de l'annonce
function toggleDisplay(showAnnonce) {
    const form = document.getElementById('form');
    const annonceDisplay = document.getElementById('annonceDisplay');

    if (showAnnonce) {
        document.getElementById('h1').textContent = "Votre annonce"
        form.style.display = 'none';
        annonceDisplay.style.display = 'flex';
        // Remplir les détails de l'annonce ici
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

// Ajouter un écouteur d'événements sur le bouton de publication pour basculer vers l'affichage de l'annonce
document.querySelector('#formBut .button').addEventListener('click', function() {
    toggleDisplay(true); // Affiche l'annonce
});

// Ajouter un écouteur d'événements sur le bouton de modification pour basculer vers le formulaire
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

// Ajoute l'écouteur d'événements avec la fonction nommée
document.getElementById('textDesc').addEventListener('input', togglePlaceholderDisplay);

const inputNumber = document.getElementById("nbjoueur");

// Fonction pour mettre à jour la valeur de l'input en respectant les limites
const updateValue = (isIncrementing) => {
    let currentValue = parseInt(inputNumber.value) || 2; // Obtient la valeur actuelle de l'input, ou 2 si non numérique
    if (isIncrementing !== undefined) {
        // Incrément ou décrément basé sur le bouton cliqué
        currentValue = isIncrementing ? Math.min(currentValue + 1, 64) : Math.max(currentValue - 1, 2);
    } else {
        // Ajuste la valeur si saisie manuellement hors limites
        currentValue = Math.min(Math.max(currentValue, 2), 64);
    }
    inputNumber.value = currentValue; // Met à jour la valeur de l'input
};

// Fonctions enveloppantes pour incrémenter et décrémenter
const incrementValue = () => updateValue(true);
const decrementValue = () => updateValue(false);

// Ajoute des écouteurs d'événements pour les boutons + et -
document.querySelector('.control-up').addEventListener('click', incrementValue);
document.querySelector('.control-down').addEventListener('click', decrementValue);

// Ajoute un écouteur d'événements pour valider la saisie manuelle
inputNumber.addEventListener('input', () => updateValue());



function resetForm() {
    // Réinitialiser les valeurs des champs
    document.querySelector('.formNom').value = '';
    document.getElementById('nom_du_jeu').value = '';
    document.getElementById('nbjoueur').value = '';
    document.getElementById('textDesc').value = '';

    // Réafficher le placeholder si masqué
    document.getElementById('placeholderText').style.display = 'block';
}
document.getElementById('deleteAnnonce').addEventListener('click', resetForm);

const validateInput = (inputElement) => {
    const value = inputElement.value;
    if (/<[^>]+>/i.test(value)) {
        alert('La saisie de code HTML n\'est pas autorisée.');
        inputElement.value = value.replace(/<[^>]+>/gm, '');
    }
    
};
document.getElementById('textDesc').addEventListener('input', () => validateInput(document.getElementById('textDesc')));
document.querySelectorAll('.formNom').forEach((inputElement) => {
    inputElement.addEventListener('input', () => validateInput(inputElement));
});

