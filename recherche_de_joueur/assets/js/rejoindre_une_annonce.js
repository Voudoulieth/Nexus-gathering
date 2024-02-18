// const inputNumber = document.getElementById("nbjoueur");

// // Fonction pour mettre à jour la valeur de l'input en respectant les limites
// const updateValue = (isIncrementing) => {
//     let currentValue = parseInt(inputNumber.value) || 1; // Obtient la valeur actuelle de l'input, ou 1 si non numérique
//     if (isIncrementing !== undefined) {
//         // Incrément ou décrément basé sur le bouton cliqué
//         currentValue = isIncrementing ? Math.min(currentValue + 1, 63) : Math.max(currentValue - 1, 1);
//     } else {
//         // Ajuste la valeur si saisie manuellement hors limites
//         currentValue = Math.min(Math.max(currentValue, 1), 63);
//     }
//     inputNumber.value = currentValue; // Met à jour la valeur de l'input
// };

// // Fonctions enveloppantes pour incrémenter et décrémenter
// const incrementValue = () => updateValue(true);
// const decrementValue = () => updateValue(false);

// // Ajoute des écouteurs d'événements pour les boutons + et -
// document.querySelector('.control-up').addEventListener('click', incrementValue);
// document.querySelector('.control-down').addEventListener('click', decrementValue);

// // Ajoute un écouteur d'événements pour valider la saisie manuelle
// inputNumber.addEventListener('input', () => updateValue());


function afficherAnnonces() {
    const annonces = JSON.parse(localStorage.getItem('annonces')) || [];
    const conteneurAnnonces = document.getElementById('conteneurAnnonces'); // Assure-toi que cet élément existe dans ton HTML

    annonces.forEach(annonce => {
        const tokenplace = document.createElement('div');
        tokenplace.className = 'tokenplace';

        const tokenAnnonce = document.createElement('div');
        tokenAnnonce.className = 'tokenAnnonce';

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

        const description = document.createElement('p');
        description.className = 'annonceDescription';
        description.textContent = annonce.description;

        const boutonRejoindre = document.createElement('button');
        boutonRejoindre.className = 'button contact';
        boutonRejoindre.textContent = 'Rejoindre';

        tokenAnnonce.appendChild(ul);
        tokenAnnonce.appendChild(description);
        tokenAnnonce.appendChild(boutonRejoindre);
        tokenplace.appendChild(tokenAnnonce);

        conteneurAnnonces.appendChild(tokenplace);
    });
}

document.addEventListener('DOMContentLoaded', afficherAnnonces);


document.getElementById('loupe').addEventListener('click', rechercheAnnonce)
document.getElementById('searchbar').addEventListener('keydown', function(event) {
    // Vérifie si la touche "Entrée" est pressée
    if (event.key === "Enter") {
        rechercheAnnonce(); // Appelle la fonction de recherche
    }
});

function rechercheAnnonce() {
    const searchTerm = document.getElementById('searchbar').value.toLowerCase();
    const annonces = document.querySelectorAll('.tokenAnnonce');

    annonces.forEach(function(annonce) {
        const nomJeu = annonce.querySelector('.annonceGameName').textContent.toLowerCase();
        const titreAnnonce = annonce.querySelector('.annonceTitle').textContent.toLowerCase();
        if (nomJeu.includes(searchTerm) || titreAnnonce.includes(searchTerm)) {
            annonce.style.display = ""; // Réinitialise le style si correspondance
        } else {
            annonce.style.display = "none"; // Masque l'annonce si pas de correspondance
        }
    });
}


function rechercheFiltree() {
    const searchTermJeu = document.getElementById('rechercheJeu').value.toLowerCase();
    const searchTermNbJoueur = parseInt(document.getElementById('nbjoueur').value, 10);
    const annonces = document.querySelectorAll('.tokenAnnonce');

    annonces.forEach(function(annonce) {
        const nomJeu = annonce.querySelector('.annonceGameName').textContent.toLowerCase();
        const nbjoueur = parseInt(annonce.querySelector('.annoncePlayerCount').textContent, 10);
        const jeuCorrespond = searchTermJeu === "" || nomJeu.includes(searchTermJeu);
        const joueurCorrespond = isNaN(searchTermNbJoueur) || nbjoueur === searchTermNbJoueur;
        
        if (jeuCorrespond && joueurCorrespond) {
            annonce.style.display = ""; // Affiche si les deux critères correspondent
        } else {
            annonce.style.display = "none"; // Masque sinon
        }
    });
}

// Ajoute des écouteurs d'événements pour le bouton et les champs de saisie
document.getElementById('buttonFiltre').addEventListener('click', rechercheFiltree);
document.getElementById('rechercheJeu').addEventListener('keydown', function(event) {
    if (event.key === "Enter") rechercheFiltree();
});
document.getElementById('nbjoueur').addEventListener('keydown', function(event) {
    if (event.key === "Enter") rechercheFiltree();
});

document.getElementById('buttonReset').addEventListener('click', resetFiltree);

function resetFiltree(){
    document.getElementById('rechercheJeu').value = "";
    document.getElementById('nbjoueur').value = "";
    rechercheFiltree();
}

// const validateInput = (inputElement) => {
//     const value = inputElement.value;
//     if (/<[^>]+>/i.test(value)) {
//         alert('La saisie de code HTML n\'est pas autorisée.');
//         inputElement.value = value.replace(/<[^>]+>/gm, '');
//     }
    
// };
// document.getElementById('searchbar').addEventListener('input', () => validateInput(document.getElementById('searchbar')));
// document.querySelectorAll('.formNom').forEach((inputElement) => {
//     inputElement.addEventListener('input', () => validateInput(inputElement));
// });

// Importez les fonctions de validations.js
import { validateInput, updateNumericValue } from './validation.js';

// Utilisez validateInput et updateNumericValue là où c'est nécessaire
const inputNumberJoin = document.getElementById("nbjoueur");
document.querySelector('.control-up').addEventListener('click', () => updateNumericValue(inputNumberJoin, true, 1, 63));
document.querySelector('.control-down').addEventListener('click', () => updateNumericValue(inputNumberJoin, false, 1, 63));
inputNumberJoin.addEventListener('input', () => updateNumericValue(inputNumberJoin, undefined, 1, 63));

document.getElementById('searchbar').addEventListener('input', () => validateInput(document.getElementById('searchbar')));
document.querySelectorAll('.formNom').forEach((inputElement) => {
    inputElement.addEventListener('input', () => validateInput(inputElement));
});

// Le reste du code de gestion spécifique à la page...
