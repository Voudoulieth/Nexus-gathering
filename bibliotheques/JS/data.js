class Jeu {
    //déclaration des propriétés privées
    #image;
    #nom;
    #dateSortie;
    // #style;
    #resume;
    // #editeur;
    // #studio;
    // #dateDebutDev;
    #consoles;
    #multijoueur;
    // #crossPlatform;
    // #format;


    // constructor (image, nom, dateSortie, style, resume, editeur, studio, dateDebutDev, consoles, multijoueur, crossPlatform, format) {
    constructor (image, nom, dateSortie, resume, consoles, multijoueur) {
        //ajout de valeur au propriétés
        this.#image = image;
        this.#nom = nom;
        this.#dateSortie = dateSortie;
        // this.#style = style;
        this.#resume = resume;
        // this.#editeur = editeur;
        // this.#studio = studio;
        // this.#dateDebutDev = dateDebutDev;
        this.#consoles = consoles;
        this.#multijoueur = multijoueur;
        // this.#crossPlatform = crossPlatform;
        // this.#format = format;
    }

    get image() {return this.#image}
    get nom() {return this.#nom}
    get dateSortie() {return this.#dateSortie}
    // get style() {return this.#style}
    get resume() {return this.#resume}
    // get editeur() {return this.#editeur}
    // get studio() {return this.#studio}
    // get dateDebutDev() {return this.#dateDebutDev}
    get consoles() {return this.#consoles}
    get multijoueur() {return this.#multijoueur}
    // get crossPlatform() {return this.#crossPlatform}
    // get format() {return this.#format}

}

//créer le tableau des jeux 
//dans le tableau data.js mettre des jeux en dur 
// afficher les jeux du tableau via un script lié a la page bibliothèque jeux (saider de lappli restaurant et de son tableau de plat)