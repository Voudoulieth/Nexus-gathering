import * as data from './data.js';

const galerie = document.querySelector("#galerieCommunautaire");

data.communautaires.forEach(quiz => {
    galerie.innerHTML += `
    <figure id="${quiz.id}">
        <figcaption>
            <p>${quiz.titre} - créé par ${quiz.auteur} - </p>
            <time datetime="${quiz.date}">${quiz.date}</time>
        </figcaption>
        <a href="${quiz.lien}">
            <img src="${quiz.img}" alt="${quiz.titre}">
        </a>
    </figure>`;
});