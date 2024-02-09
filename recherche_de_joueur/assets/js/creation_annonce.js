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
