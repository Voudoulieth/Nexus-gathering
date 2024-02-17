import * as data from './data.js';

const galerie = document.querySelector("#galerieOfficiel");

data.officiels.forEach(quiz => {
    galerie.innerHTML += `
    <figure id="${quiz.id}">
        <figcaption>
            <p>${quiz.titre} - </p>
            <time datetime="${quiz.date}">${quiz.date}</time>
        </figcaption>
        <a href="${quiz.lien}">
            <img src="${quiz.img}" alt="${quiz.titre}">
        </a>
    </figure>`;
});
