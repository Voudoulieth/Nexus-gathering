document.addEventListener('DOMContentLoaded', () => {
    const Modifier = document.querySelector('button[name="action"][value="modifier"]');
    const Valider = document.querySelector('button[name="submit"]');
    const PageJeu = document.querySelector('#pageJeu');
    const ModifJeu = document.querySelector('#updateJeu');

    Modifier.addEventListener('click', (event) => {
        event.preventDefault();
        Valider.style.display = 'block';
        ModifJeu.style.display = 'block';
        Modifier.style.display = 'none';
        PageJeu.style.display = 'none';

        // Récupérer les données du jeu à partir des éléments existants
        const jeuData = {
            id: document.querySelector('input[name="id_jeu"]').value,
            nom: document.getElementById('nom_jeu')?.value || '',
            resume: document.getElementById('resum_jeu')?.value || '',
            img: document.getElementById('img_jeu')?.src || '',
            date_Sortie: document.getElementById('date_sortie')?.value || '',
            style: []
        };

        // Récupérer les styles sélectionnés
        const styleCheckboxes = document.querySelectorAll('input[name="choixS[]"]:checked');
        jeuData.style = Array.from(styleCheckboxes).map(checkbox => checkbox.value);

        // Remplir le formulaire avec les données existantes
        document.querySelector('#nom_jeu').value = jeuData.nom;
        document.querySelector('#resum_jeu').value = jeuData.resume;
        document.querySelector('#img_jeu').value = jeuData.img;
        const dateSortieElement = document.querySelector('#date_sortie');
        if (dateSortieElement) {
            dateSortieElement.value = jeuData.date_Sortie;
        }

        // Cocher les styles correspondants
        jeuData.style.forEach(style => {
            const checkbox = document.querySelector(`input[name="choixS[]"][value="${style}"]`);
            if (checkbox) {
                checkbox.checked = true;
            }
        });
    });
});