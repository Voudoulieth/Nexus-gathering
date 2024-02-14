/*  récuperer les données dans un tableau afin d'afficher que ceux ayant :checked
    page ayant deux état : en mode édition ou non avec un boulean qui garde l'état de la page (edition oui/non)
    récupérer les saisies
    page mode non editable => affichage normal
    page en mode editable => bouton radio etc 
    Modifier la zone des photos afin de mettre des [+] et une fonction associé qui return console.log('ajoute un jeu') */

export class Profil {
    #pseudo
    #password
    #email
    #avatar
    #temps
    #niveau
    #type //tableaux
    #bio // zone de texte
    #interets // zone de texte
    #mode

    constructor(pseudo : string, password : string, email : string,avatar : string ,temps : string,niveau : any, type : string , bio : string, interets : string, mode : any) {
        this.#pseudo    = pseudo;
        this.#password  = password;
        this.#email     = email;
        this.#avatar    = avatar;
        this.#temps     = temps;
        this.#niveau    = niveau;
        this.#type      = type;
        this.#bio       = bio;
        this.#interets  = interets;
        this.#mode      = mode;

    }
    
    get pseudo()    {return this.#pseudo}
    get password()  {return this.#password}
    get email()     {return this.#email}
    get avatar()    {return this.#avatar}
    get temps()     {return this.#temps}
    get niveau()    {return this.#niveau}
    get type()      {return this.#type}
    get bio()       {return this.#bio}
    get interets()  {return this.#interets}
    get mode()      {return this.#mode}


    set password(password) {this. #password = password}
    set email(email) {this.#email = email}
    set avatar(avatar) {this.#avatar = avatar}
    set temps(temps) {this.#temps = temps}
    set niveau(niveau) {this.#niveau = niveau}
    set type(type) {this.#type = type}
    set bio(bio) {this.#bio = bio}
    set interets(interets) {this.#interets = interets}
    set mode(mode) {this.#mode = mode}
    
}