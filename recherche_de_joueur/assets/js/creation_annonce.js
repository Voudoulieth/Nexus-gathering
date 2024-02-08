document.getElementById('textDesc').addEventListener('input', function() {
    var placeholder = document.getElementById('placeholderText');
    if (this.value) {
        placeholder.style.display = 'none';
    } else {
        placeholder.style.display = 'block';
    }
});

const inputNumber = document.getElementById("nbjoueur")

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

// Ajoute un écouteur d'événement pour le bouton +
document.querySelector('.control-up').addEventListener('click', function() {
    updateValue(true); // Appelle updateValue avec true pour incrémenter
});

// Ajoute un écouteur d'événement pour le bouton -
document.querySelector('.control-down').addEventListener('click', function() {
    updateValue(false); // Appelle updateValue avec false pour décrémenter
});