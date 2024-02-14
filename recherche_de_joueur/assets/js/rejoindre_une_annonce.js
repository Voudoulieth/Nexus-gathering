const inputNumber = document.getElementById("nbjoueur");

// Fonction pour mettre à jour la valeur de l'input en respectant les limites
const updateValue = (isIncrementing) => {
    let currentValue = parseInt(inputNumber.value) || 1; // Obtient la valeur actuelle de l'input, ou 1 si non numérique
    if (isIncrementing !== undefined) {
        // Incrément ou décrément basé sur le bouton cliqué
        currentValue = isIncrementing ? Math.min(currentValue + 1, 63) : Math.max(currentValue - 1, 1);
    } else {
        // Ajuste la valeur si saisie manuellement hors limites
        currentValue = Math.min(Math.max(currentValue, 1), 63);
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