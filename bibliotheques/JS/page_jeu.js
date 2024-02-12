// Sélection du bouton "Modifier"
const Modifier = document.querySelector('button[name="button"]');
// Sélection du bouton "Valider"
const Valider = document.querySelector('button[name="submit"]');

// Ajout d'un écouteur d'événement pour le clic sur le bouton "Modifier"
Modifier.addEventListener('click', () => {
    // Affichage du bouton "Valider"
    Valider.style.display = 'block';
    // Masquage du bouton "Modifier"
    Modifier.style.display = 'none';

    // Sélection de tous les éléments que vous souhaitez modifier
    let inputs = document.querySelectorAll('input');
    let checkboxes = document.querySelectorAll('input[type="checkbox"]');

    // Parcours des saisies de texte et suppression de l'attribut 'readonly'
    inputs.forEach(input => {
        input.removeAttribute('readonly');
    });

    // Parcours des cases à cocher et suppression de l'attribut 'disabled'
    checkboxes.forEach(checkbox => {
        checkbox.removeAttribute('disabled');
    });

    // Vous pouvez également ajouter d'autres modifications ici, selon vos besoins
});
