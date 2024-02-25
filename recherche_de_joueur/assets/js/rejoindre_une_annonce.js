import { validateInput, updateNumericValue } from './validation.js';

// Gère l'incrémentation et la décrémentation du nombre de joueurs et sa validation
const inputNumberJoin = document.getElementById("nbjoueur");
document.querySelector('.control-up').addEventListener('click', () => updateNumericValue(inputNumberJoin, true, 1, 63));
document.querySelector('.control-down').addEventListener('click', () => updateNumericValue(inputNumberJoin, false, 1, 63));
inputNumberJoin.addEventListener('input', () => updateNumericValue(inputNumberJoin, undefined, 1, 63));

// Controle de saisie de la barre de recherche et chaque champ de formulaire lors de la saisie
document.getElementById('searchbar').addEventListener('input', () => validateInput(document.getElementById('searchbar')));
document.querySelectorAll('.formNom').forEach((inputElement) => {
    inputElement.addEventListener('input', () => validateInput(inputElement));
});

// Affiche les annonces stockées dans le localStorage au chargement de la page
function afficherAnnonces() {
    const annonces = JSON.parse(localStorage.getItem('annonces')) || [];
    const conteneurAnnonces = document.getElementById('conteneurAnnonces');

    annonces.forEach(annonce => {
        // Crée et configure les éléments HTML pour chaque annonce
        const tokenplace = document.createElement('div');
        tokenplace.className = 'tokenplace';

        const tokenAnnonce = document.createElement('div');
        tokenAnnonce.className = 'tokenAnnonce';

        // Ajoute les détails de l'annonce (titre, jeu, nombre de joueurs)
        const ul = document.createElement('ul');
        const liTitre = document.createElement('li');
        liTitre.className = 'annonceTitle';
        liTitre.textContent = annonce.titre;

        const liJeu = document.createElement('li');
        liJeu.className = 'annonceGameName';
        liJeu.textContent = annonce.jeu;

        const liNombreJoueurs = document.createElement('li');
        liNombreJoueurs.className = 'annoncePlayerCount';
        liNombreJoueurs.textContent = annonce.nombreJoueurs;

        ul.appendChild(liTitre);
        ul.appendChild(liJeu);
        ul.appendChild(liNombreJoueurs);

        // Description et bouton rejoindre
        const description = document.createElement('p');
        description.className = 'annonceDescription';
        description.textContent = annonce.description;

        const boutonRejoindre = document.createElement('button');
        boutonRejoindre.className = 'button contact';
        boutonRejoindre.textContent = 'Rejoindre';

        // Assemble l'annonce et l'ajoute au conteneur
        tokenAnnonce.appendChild(ul);
        tokenAnnonce.appendChild(description);
        tokenAnnonce.appendChild(boutonRejoindre);
        tokenplace.appendChild(tokenAnnonce);

        conteneurAnnonces.appendChild(tokenplace);
    });
}

// Affiche les annonces dès que le DOM est chargé
document.addEventListener('DOMContentLoaded', afficherAnnonces);

// Recherche d'annonces par titre ou jeu
document.getElementById('loupe').addEventListener('click', rechercheAnnonce)
document.getElementById('searchbar').addEventListener('keydown', function(event) {
    if (event.key === "Enter") {
        rechercheAnnonce(); // Déclenche la recherche avec Enter
    }
});

function rechercheAnnonce() {
    const searchTerm = document.getElementById('searchbar').value.toLowerCase();
    const annonces = document.querySelectorAll('.tokenAnnonce');

    annonces.forEach(function(annonce) {
        // Affiche ou cache l'annonce selon la correspondance avec le terme de recherche
        const nomJeu = annonce.querySelector('.annonceGameName').textContent.toLowerCase();
        const titreAnnonce = annonce.querySelector('.annonceTitle').textContent.toLowerCase();
        annonce.style.display = nomJeu.includes(searchTerm) || titreAnnonce.includes(searchTerm) ? "" : "none";
    });
}

// Filtrage avancé des annonces par jeu et nombre de joueurs
function rechercheFiltree() {
    const searchTermJeu = document.getElementById('rechercheJeu').value.toLowerCase();
    const searchTermNbJoueur = parseInt(document.getElementById('nbjoueur').value, 10);
    const annonces = document.querySelectorAll('.tokenAnnonce');

    annonces.forEach(function(annonce) {
        // Applique le filtre sur chaque annonce
        const nomJeu = annonce.querySelector('.annonceGameName').textContent.toLowerCase();
        const nbjoueur = parseInt(annonce.querySelector('.annoncePlayerCount').textContent, 10);
        
        const jeuCorrespond = searchTermJeu === "" || nomJeu.includes(searchTermJeu);
        const joueurCorrespond = isNaN(searchTermNbJoueur) || nbjoueur === searchTermNbJoueur;
        
        annonce.style.display = jeuCorrespond && joueurCorrespond ? "" : "none";
    });
}

// Écouteurs pour le filtrage et la réinitialisation des filtres
document.getElementById('buttonFiltre').addEventListener('click', rechercheFiltree);
document.getElementById('rechercheJeu').addEventListener('keydown', function(event) {
    if (event.key === "Enter") rechercheFiltree();
});
document.getElementById('nbjoueur').addEventListener('keydown', function(event) {
    if (event.key === "Enter") rechercheFiltree();
});

// Réinitialise les champs de filtre et applique à nouveau le filtre
document.getElementById('buttonReset').addEventListener('click', () => {
    document.getElementById('rechercheJeu').value = "";
    document.getElementById('nbjoueur').value = "";
    rechercheFiltree();
});
