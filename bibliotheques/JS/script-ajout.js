import * as data from './data.js';

let formulaireAjout = document.querySelector("#ajoutJeu");
formulaireAjout.addEventListener("submit", function(event){
    event.preventDefault();

    console.log("bouton");

    let image = document.querySelector("#image").files[0].name;
    let nom = document.querySelector("#nom").value;
    let dateSortie = document.querySelector("#dateSortie").value;
    // let style = document.querySelector("#style").value;
    let resume = document.querySelector("#resume").value;
    
    // let editeur = document.querySelector("#editeur").value;
    // let studio = document.querySelector("#studio").value;
    // let dateDebutDev = document.querySelector("#dateDebutDev").value;

    let consoles = [];
    let checkboxes = document.querySelectorAll('input[name="choix"]:checked'); //selectionne tous les éléments choix cochés
    checkboxes.forEach(function(checkbox) { //itére sur chaque élément recup dans la liste checkboxes
        consoles.push(checkbox.value);//recupére la value de chaque éléments coché et l'envoie a un tableau consoles
    });

    let multijoueur = document.querySelector('input[name="optionsM"]:checked').value;
    // let crossPlatform = document.querySelector('input[name="optionsC"]:checked').value;
    // let format = document.getElementById('format').value;

    console.log(image)
    console.log(nom)
    console.log(dateSortie)
    console.log(resume)
    console.log(consoles.join(" , "))
    console.log(multijoueur)

    // controler les données
    let alert = document.querySelector("#alert");
    alert.textContent = "";
    if (nom.trim().length == 0) {
        alert.textContent = "Veuillez saisir un nom";
    } 

    //si il n'y a pas d'erreur alors je créer le jeu

    if (alert.textContent == "") {
        let jeu = new Jeu (image, nom, dateSortie, resume, consoles, multijoueur)
        // constructor (image, nom, dateSortie, resume, consoles, multijoueur) {
        // ajouter le jeu dans le tableau des jeux
        // afficher le tableau des jeux
    }

})

// afficher la liste des jeux




















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