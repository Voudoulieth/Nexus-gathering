import * as data from './data.js';

data.communautaires.forEach(quiz => {
    let galerie = document.querySelector("#galerieCommunautaire");
    galerie.innerHTML +=
    `<figure id="${quiz.id}">
    <figcaption>
        <p>${quiz.titre} - créé par ${quiz.auteur} - </p>
        <time datetime="${quiz.date}">${quiz.date}</time>
    </figcaption>
    <a href="${quiz.lien}">
        <img src="${quiz.img}">
    </a>
    </figure>`;
});