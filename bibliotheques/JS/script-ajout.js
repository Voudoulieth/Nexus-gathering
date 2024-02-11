import * as data from './data.js';
import {Jeu} from './data.js';

let formulaireAjout = document.querySelector("#ajoutJeu");

formulaireAjout.addEventListener("submit", function(event){
    event.preventDefault();

    let image = document.querySelector("#image").files[0].name;
    let nom = document.querySelector("#nom").value;
    let dateSortie = document.querySelector("#dateSortie").value;
    // let style = document.querySelector("#style").value;
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

    let consoles = [];
    let checkboxes = document.querySelectorAll('input[name="choix"]:checked'); //selectionne tous les éléments choix cochés
    checkboxes.forEach(function(checkbox) { //itére sur chaque élément recup dans la liste checkboxes
        consoles.push(checkbox.value); //recupére la value de chaque éléments coché et l'envoie a un tableau consoles
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
        let jeu = new Jeu (image, nom, dateSortie, resume, consoles, multijoueur);
        // constructor (image, nom, dateSortie, resume, consoles, multijoueur) {
        data.jeu.push(jeu);
        afficherListeJeu();
        // ajouter le jeu dans le tableau des jeux
        // afficher le tableau des jeux
    }
});

















// document.getElementById("ajoutJeu").addEventListener("submit", function(event) {
//     event.preventDefault();

//     // Récupère les données du formulaire
//     var formData = new FormData(this);

//     // Envoie les données à la première page
//     fetch("page_destination_1.html", {
//         method: "POST",
//         body: formData
//     });

//     // Envoie les données à la deuxième page
//     fetch("page_destination_2.html", {
//         method: "POST",
//         body: formData
//     });

//     // Redirige vers la première page
//     window.location.href = "page_destination_1.html";
// });
