import * as data from './data.js';
import {Jeu} from './data.js';

let formulaireAjout = document.querySelector("#ajoutJeu");

formulaireAjout.addEventListener("submit", function(event){
    event.preventDefault();

    let image = document.querySelector("#image").files[0].name;
    let nom = document.querySelector("#nom").value;
    let dateSortie = document.querySelector("#dateSortie").value;
    let resume = document.querySelector("#resume").value;
    // let editeur = document.querySelector("#editeur").value;
    // let studio = document.querySelector("#studio").value;
    // let dateDebutDev = document.querySelector("#dateDebutDev").value;

    // controler les données
    let alert = document.querySelector("#alert");
    alert.textContent = "";

    if (nom.trim().length === 0 || resume.trim().length === 0) {
        alert.textContent = "Veuillez completer tout les champs du formulaire";
    } else if (!isNaN(nom) || !isNaN(resume)) {
        alert.textContent = "Veuillez na pas saisir uniquement que des chiffres";
    } else if (nom === "" || resume === "") {
        alert.textContent = "Veuillez ne pas saisir uniquement des espaces";
    }

    let style = [];
    let choixStyle = document.querySelectorAll('input[name="choixS"]:checked');
    choixStyle.forEach(function(styleCheckbox) {
        style.push(styleCheckbox.value);
    });
        if (style.length === 0) {
            alert.textContent = "Veuillez sélectionner au moins une option pour le style du jeu"
        }

    let consoles = [];
    let choixConsoles = document.querySelectorAll('input[name="choixC"]:checked'); //selectionne tous les éléments choix cochés
    choixConsoles.forEach(function(consoleCheckbox) { //itére sur chaque élément recup dans la liste checkboxes
        consoles.push(consoleCheckbox.value); //recupére la value de chaque éléments coché et l'envoie a un tableau consoles
    });
        if (consoles.length === 0) {
            alert.textContent = "Veuillez sélectionner au moins une option pour les consoles";
        }

    let multijoueur = document.querySelector('input[name="optionsM"]:checked');
    if (!multijoueur) {
        alert.textContent = "Veuillez sélectionner une option pour le multijoueur";
    }
    // let crossPlatform = document.querySelector('input[name="optionsC"]:checked').value;
    // let format = document.getElementById('format').value;

    //si il n'y a pas d'erreur alors je créer le jeu
    if (alert.textContent === "") {
        let jeu = new Jeu (image, nom, dateSortie, style, resume, consoles, multijoueur);
        // constructor (image, nom, dateSortie, resume, consoles, multijoueur) {
        data.jeu.push(jeu);
        afficherListeJeu();
        // ajouter le jeu dans le tableau des jeux
        // afficher le tableau des jeux
    }
});

function afficherListeJeu() {
    data.jeu.forEach(function(jeu){
        console.log(jeu)
    });
}
// console.log(Jeu)
console.dir(Jeu)