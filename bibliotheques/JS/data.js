class InfoJeu {
    #image;
    #nom;
    #dateSortie;
    #style;
    #resume;

    constructor (image, nom, dateSortie, style, resume) {
        this.#image = image;
        this.#nom = nom;
        this.#dateSortie = dateSortie;
        this.#style = style;
        this.#resume = resume;
    }

    get image() {return this.#image}
    get nom() {return this.#nom}
    get dateSortie() {return this.#dateSortie}
    get style() {return this.#style}
    get resume() {return this.#resume}

}

//===================Liste biblio générale===================================================================
class ListeBiblioGenerale extends InfoJeu {
    constructor(image, nom, dateSortie, style, resume) {
        super(image, nom, dateSortie, style, resume);''
    }
}

//====================page du jeu==================================================================================
class PageJeu extends InfoJeu {
    #editeur;
    #studio;
    #dateDebutDev;
    constructor(image, nom, dateSortie, style, resume, editeur, studio, dateDebutDev) {
        super(image, nom, dateSortie, style, resume);''
        this.#editeur = editeur;
        this.#studio = studio;
        this.#dateDebutDev = dateDebutDev;
    }

    get editeur() {return this.#editeur}
    get studio() {return this.#studio}
    get dateDebutDev() {return this.#dateDebutDev}

}