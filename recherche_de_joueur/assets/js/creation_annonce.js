// Fonction pour basculer l'affichage du formulaire et de l'annonce
function toggleDisplay(showAnnonce) {
    const form = document.getElementById('form');
    const annonceDisplay = document.getElementById('annonceDisplay');

    if (showAnnonce) {
        form.style.display = 'none';
        annonceDisplay.style.display = 'block';
        // Remplir les détails de l'annonce ici
        document.getElementById('annonceTitle').textContent = document.querySelector('.formNom').value;
        document.getElementById('annonceGameName').textContent = document.getElementById('nom_du_jeu').value;
        document.getElementById('annoncePlayerCount').textContent = document.getElementById('nbjoueur').value;
        document.getElementById('annonceDescription').textContent = document.getElementById('textDesc').value;
    } else {
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

// Fonction pour mettre à jour la valeur de l'input
function updateValue(isIncrementing) {
    let currentValue = parseInt(inputNumber.value) || 2; // Obtient la valeur actuelle de l'input, ou 0 si non numérique
    if (isIncrementing) {
        currentValue = currentValue < 64 ? currentValue + 1 : 64; // Incrémente si moins de 64
    } else {
        currentValue = currentValue > 2 ? currentValue - 1 : 2; // Décrémente si plus de 2
    }
    inputNumber.value = currentValue; // Met à jour la valeur de l'input
}

// Fonctions enveloppantes pour incrémenter et décrémenter
function incrementValue() {
    updateValue(true);
}

function decrementValue() {
    updateValue(false);
}

// Ajoute des écouteurs d'événements pour les boutons + et -
document.querySelector('.control-up').addEventListener('click', incrementValue);
document.querySelector('.control-down').addEventListener('click', decrementValue);

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
