export class Jeu {
    //déclaration des propriétés privées
    #image;
    #nom;
    #dateSortie;
    #style;
    #resume;
    // #editeur;
    // #studio;
    // #dateDebutDev;
    #consoles;
    #multijoueur;
    // #crossPlatform;
    // #format;

    // constructor (image, nom, dateSortie, style, resume, editeur, studio, dateDebutDev, consoles, multijoueur, crossPlatform, format) {
    constructor(image, nom, dateSortie, style, resume, consoles, multijoueur) {
        //ajout de valeur au propriétés
        this.#image = image;
        this.#nom = nom;
        this.#dateSortie = dateSortie;
        this.#style = style;
        this.#resume = resume;
        // this.#editeur = editeur;
        // this.#studio = studio;
        // this.#dateDebutDev = dateDebutDev;
        this.#consoles = consoles;
        this.#multijoueur = multijoueur;
        // this.#crossPlatform = crossPlatform;
        // this.#format = format;
    }

    get image() { return this.#image }
    get nom() { return this.#nom }
    get dateSortie() { return this.#dateSortie }
    get style() {return this.#style}
    get resume() { return this.#resume }
    // get editeur() {return this.#editeur}
    // get studio() {return this.#studio}
    // get dateDebutDev() {return this.#dateDebutDev}
    get consoles() { return this.#consoles }
    get multijoueur() { return this.#multijoueur }
    // get crossPlatform() {return this.#crossPlatform}
    // get format() {return this.#format}

    getJeu = function () {
        return `
        <div class="bg-[#f45a01]/95 rounded-full text-[#f1f7f9] font-semibold flex m-5">\
            <img class="rounded-full p-1 w-20" src="${this.image}" alt="Image du jeu"/>\
            <div class="grid grid-cols-5 h-16">\
                <h3 class="font-['Changa'] text-[1.68em] font-bold place-self-center">${this.nom}</h3>\
                <p class="place-self-center text-[0.875em]">${this.dateSortie}</p>\
                <p class="place-self-center text-[0.875em]">${this.style}</p>\
                <p class="text-clip overflow-hidden text-[0.875em] mt-2">${this.resume}</p>\
                <div class="flex justify-end mr-5">\
                    <a href="./page-jeu" class="rounded-full font-['Open Sans'] bg-[#733790]/95 place-self-center text-center text-[1.06em] p-2 pl-5 pr-5">Voir</a>\
                </div>\
            </div>\
        </div>
    `;
};
}

let hoi4 = new Jeu("../assets/image/Hoi4.jpg", "Hearts of iron 4", "06 juin 2016", "jeu de grande stratégie", "Le joueur prend le contrôle d'une nation, et gère les aspects économique, militaire, et politique de son pays. Les pays ont chacun un arbre de priorités nationales qui octroie divers avantages et définit ainsi la direction et le rôle que prend le pays pendant le conflit.", "PC", "oui");
let cyberpunk = new Jeu("../assets/image/cyberpunk.jpg", "Cyberpunk 2077", "10 décembre 2020", "Action-RPG, action-aventure", "L'histoire de Cyberpunk 2077 prend place sur Terre en 2077 et se déroule dans la mégapole futuriste de Night City dans l’État libre de Californie. Dans ce monde futuriste à tendance cyberpunk et dystopique où règnent la pauvreté et les inégalités, l'influence des mégacorporations est prédominante celles-ci ayant pris le pas sur les gouvernements et dictant leur loi, ainsi que celle du cyberespace, la «Nouvelle Frontière» de cette époque.", "PS4, PS5, Xbox One, Xbox Series, Steam Decks, PC", "non");
let mtw2 = new Jeu("../assets/image/mtw2.png", "Medieval total war 2", "10 novembre 2006", "Jeu de tactique en temps réel", "Le jeu se déroule en Europe, en Afrique du Nord et au Moyen-Orient pendant une période du Moyen Âge allant de 1080 à 1530. La campagne principale met en scène les nations européennes du Moyen-Age, comme la France et l'Angleterre.", "PC", "oui");
let mab2b = new Jeu("../assets/image/mab2b.jpg", "Mount & Blade II : Bannerlord", "30 mars 2020", "Action RPG", "Créez et développez un personnage qui vous correspond et explorez, pillez et conquérez dans un vaste bac à sable médiéval qui rend chaque partie unique. Levez des armées, usez de diplomatie, commercez, créez des armes, recrutez des compagnons et gérez votre fief pour tenter de hisser votre clan dans les hautes sphères de la noblesse de Calradia. Commandez une armée et combattez à ses côtés dans de batailles en temps réel à la première ou troisième personne utilisant le système de combat intuitif et complet basé sur les compétences de Mount & Blade.", "PS5, PS4, Xbox One, Xbox series, PC", "oui");


export let jeu = [hoi4, cyberpunk, mtw2, mab2b];

export function afficherListeJeu() {
    console.log(jeu);
    let listejeu = document.querySelector('#listejeu');
    console.log(listejeu);
    listejeu.innerHTML = "";
    jeu.forEach(function(jeu){
        let jeuElement = document.createElement("div");
        jeuElement.innerHTML = jeu.getJeu();
        listejeu.appendChild(jeuElement);
    });
}