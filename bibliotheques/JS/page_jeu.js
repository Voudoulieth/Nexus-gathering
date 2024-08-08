document.addEventListener('DOMContentLoaded', () => {
    const Modifier = document.querySelector('button[name="action"][value="modifier"]');
    const Valider = document.querySelector('button[name="submit"]');
    const PageJeu = document.querySelector('#pageJeu');
    const AjoutJeu = document.querySelector('#ajoutJeu');

    Modifier.addEventListener('click', () => {
        Valider.style.display = 'block';
        AjoutJeu.style.display = 'block';
        Modifier.style.display = 'none';
        PageJeu.style.display = 'none';

        // Récupérer les données du jeu à partir des éléments existants
        const jeuData = {
            nom: document.getElementById('nom_jeu').textContent || '',
            resume: document.getElementById('resume_jeu').textContent || '',
            img: document.getElementById('img_jeu').src || '',
            dateSortie: document.getElementById('date_sortie').textContent || '',
            style: document.getElementById('style_jeu').textContent.split(', ') || []
        };

        // Remplir le formulaire avec les données existantes
        document.querySelector('#nom_jeu').value = jeuData.nom;
        document.querySelector('#resume_jeu').value = jeuData.resume;
        document.querySelector('#img_jeu').value = jeuData.img;
        document.querySelector('#dateSortie').value = jeuData.dateSortie;

        // Cocher les styles correspondants
        jeuData.style.forEach(style => {
            const checkbox = document.querySelector(`input[name="choixS[]"][value="${style}"]`);
            if (checkbox) {
                checkbox.checked = true;
            }
        });
    });
});