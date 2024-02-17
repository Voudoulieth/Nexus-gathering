class Quiz {
    #id;
    #type;
    #titre;
    #date;
    #lien;
    #img;
    #auteur;
    constructor(id, type, titre, date, lien, img, auteur) {
        this.#id     = id;
        this.#type   = type;
        this.#titre  = titre;
        this.#date   = date;
        this.#lien   = lien;
        this.#img    = img;
        this.#auteur = auteur;
    }
    get id()      {return this.#id;}
    get type()    {return this.#type;}
    get titre()   {return this.#titre;}
    get date()    {return this.#date;}
    get lien()    {return this.#lien;}
    get img()     {return this.#img;}
    get auteur()  {return this.#auteur;}
}

// ******* Les datas

let lol     = new Quiz("qc1", "communautaire", "Legue of Legends", "2024-01-05", "./quiz-jouer/quiz-jouer-com-lol.html", "./quiz-assets/couverture-quiz/lol.jpg", "Océane");
let genshin = new Quiz("qo1", "officiel", "Genshin Impact", "2024-01-09", "./quiz-jouer/quiz-jouer-off-genshin.html", "./quiz-assets/couverture-quiz/genshin.jpeg", "");
let baldur  = new Quiz("qo2", "officiel", "Baldur's gate 3", "2024-01-07", "./quiz-jouer/quiz-jouer-off-baldur.html", "./quiz-assets/couverture-quiz/baldur.jpg", "");

export let communautaires  = [lol];
export let officiels       = [genshin, baldur];