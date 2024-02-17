import * as data from './data.js';

let quizAdmin = [...data.communautaires,...data.officiels];
let galerie = document.querySelector("#galerieAdmin");
// Affichage de tous les quiz existants

quizAdmin.forEach(quiz => galerie.innerHTML += quizHTML(quiz));

function quizHTML(quiz){
    return `<figure id="${quiz.id}">
    <figcaption>
        <p>${quiz.titre} - créé par ${quiz.auteur} - </p>
        <time datetime="${quiz.date}">${quiz.date}</time>
    </figcaption>
    <a href="${quiz.lien}">
        <img src="${quiz.img}">
    </a>
    </figure>`;
}

// Gestion de l'affichage des quiz en fonction du radio sélectionné

let panneauAdmin=document.querySelector("#panneauAdmin");

// listener sur les <input> des types de quiz
let radios = panneauAdmin.querySelectorAll("input");
radios.forEach(radio => radio.addEventListener("click", typeQuiz));

// recupere l'element html (le <input>) sur lequel l'utilisateur a click dans le menu (type de plat)
function typeQuiz(event) {
    let typeRadio = event.target; //target l'input cliqué
    let quizChoisis = recupQuizChoisis(typeRadio.id); // Les id possibles sont : communautaire, officiel, tous
    galerie.innerHTML=''; // Vider la galerie afin de pouvoir mettre la sélection de quiz choisis

    quizChoisis.forEach(quiz => galerie.innerHTML += quizHTML(quiz));
}

// recupere les quiz qui ont pour type ${id}
function recupQuizChoisis(id) {

    let tableauQuizChoisis = new Array();
    
        if (id==="tous") tableauQuizChoisis=quizAdmin;
        else {
            quizAdmin.forEach(quiz=>{
                if (id===quiz.type) tableauQuizChoisis.push(quiz);
            });
        };
    console.log(tableauQuizChoisis);
    return tableauQuizChoisis;
}