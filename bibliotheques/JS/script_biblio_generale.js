import * as data from './data.js';

document.addEventListener("DOMContentLoaded", function() {
    // Afficher la liste des jeux
    function afficherListeJeu() {
        let listejeu = document.querySelector('#listejeu');
        listejeu.innerHTML = "";
        data.jeu.forEach(function(jeu){
            let jeuElement = document.createElement("div");
            jeuElement.innerHTML = jeu.getJeu();
            listejeu.appendChild(jeuElement);
        });
    }
    data.afficherListeJeu();
});