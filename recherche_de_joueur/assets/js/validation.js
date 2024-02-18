export function validateInput(inputElement) {
    const value = inputElement.value;
    if (/<[^>]+>/i.test(value)) { // Détecte toute tentative d'injection de HTML
        alert("La saisie de code HTML n'est pas autorisée.");
        inputElement.value = ''; // Vide l'input
    }
}


 // Met à jour la valeur numérique d'un input en respectant les limites données.

export function updateNumericValue(inputElement, isIncrementing, min, max) {
    let currentValue = parseInt(inputElement.value) || min; // Utilise la valeur minimale si la conversion échoue
    if (isIncrementing !== undefined) {
        currentValue = isIncrementing ? Math.min(currentValue + 1, max) : Math.max(currentValue - 1, min);
    } else {
        // Ajuste la valeur si saisie manuellement hors limites
        currentValue = Math.min(Math.max(currentValue, min), max);
    }
    inputElement.value = currentValue;
}
