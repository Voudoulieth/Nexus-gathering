import * as data from './data.js';

const quizAdmin = [...data.communautaires,...data.officiels];
const galerie   = document.querySelector("#galerieAdmin");

// ETAPE 1 : Affichage de tous les quiz existants, affichage par défaut à l'arrivée sur la page
quizAdmin.forEach(quiz => galerie.innerHTML += quizHTML(quiz));

function quizHTML(quiz){
    let type = (quiz.type === "communautaire") ? ` - créé par ${quiz.auteur}` : "";
    return `
    <figure id="${quiz.id}">
        <figcaption>
            <p>${quiz.titre}${type}</p>
            <time datetime="${quiz.date}">${quiz.date}</time>
        </figcaption>
        <a href="${quiz.lien}">
            <img src="${quiz.img}" alt="${quiz.titre}">
        </a>
    </figure>`;
}

// ETAPE 2 : Gestion de l'affichage des quiz en fonction de l'input de type radio sélectionné
const panneauAdmin  = document.querySelector("#panneauAdmin");
const radios        = panneauAdmin.querySelectorAll("input"); // Récupère tous les <input> dans la <div> identifiée #panneauAdmin

radios.forEach(radio => radio.addEventListener("click", typeQuiz));

function typeQuiz(event) {
    const typeRadio   = event.target; // Cible le <input> cliqué
    const quizChoisis = recupQuizChoisis(typeRadio.id); // Lance la fonction qui va récupérer les quiz selon leur type
    galerie.innerHTML = ''; // Vider la galerie afin de pouvoir mettre la sélection de quiz choisis
    quizChoisis.forEach(quiz => galerie.innerHTML += quizHTML(quiz));
}

function recupQuizChoisis(id) { // Les id possibles sont : communautaire, officiel, tous (ce sont les id des différents <input>, ainsi l'id en paramètre de la fonction dépend de l'<input> cliqué)
    let tableauQuizChoisis = []; // Le tableau dans lequel on mettra les quiz correspondant au type voulu
    if (id === "tous") tableauQuizChoisis = quizAdmin;
    else {
        quizAdmin.forEach(quiz => {
            if (id === quiz.type) tableauQuizChoisis.push(quiz);
        });
    };
    return tableauQuizChoisis;
}