/*  récuperer les données dans un tableau afin d'afficher que ceux ayant :checked
    page ayant deux état : en mode édition ou non avec un boulean qui garde l'état de la page (edition oui/non)
    récupérer les saisies
    page mode non editable => affichage normal
    page en mode editable => bouton radio etc
    Modifier la zone des photos afin de mettre des [+] et une fonction associé qui return console.log('ajoute un jeu') */
var __classPrivateFieldSet = (this && this.__classPrivateFieldSet) || function (receiver, state, value, kind, f) {
    if (kind === "m") throw new TypeError("Private method is not writable");
    if (kind === "a" && !f) throw new TypeError("Private accessor was defined without a setter");
    if (typeof state === "function" ? receiver !== state || !f : !state.has(receiver)) throw new TypeError("Cannot write private member to an object whose class did not declare it");
    return (kind === "a" ? f.call(receiver, value) : f ? f.value = value : state.set(receiver, value)), value;
};
var __classPrivateFieldGet = (this && this.__classPrivateFieldGet) || function (receiver, state, kind, f) {
    if (kind === "a" && !f) throw new TypeError("Private accessor was defined without a getter");
    if (typeof state === "function" ? receiver !== state || !f : !state.has(receiver)) throw new TypeError("Cannot read private member from an object whose class did not declare it");
    return kind === "m" ? f : kind === "a" ? f.call(receiver) : f ? f.value : state.get(receiver);
};
var _Profil_pseudo, _Profil_password, _Profil_email, _Profil_avatar, _Profil_temps, _Profil_niveau, _Profil_type, _Profil_bio, _Profil_interets, _Profil_mode;
export class Profil {
    constructor(pseudo, password, email, avatar, temps, niveau, type, bio, interets, mode) {
        _Profil_pseudo.set(this, void 0);
        _Profil_password.set(this, void 0);
        _Profil_email.set(this, void 0);
        _Profil_avatar.set(this, void 0);
        _Profil_temps.set(this, void 0);
        _Profil_niveau.set(this, void 0);
        _Profil_type.set(this, void 0); //tableaux
        _Profil_bio.set(this, void 0); // zone de texte
        _Profil_interets.set(this, void 0); // zone de texte
        _Profil_mode.set(this, void 0);
        __classPrivateFieldSet(this, _Profil_pseudo, pseudo, "f");
        __classPrivateFieldSet(this, _Profil_password, password, "f");
        __classPrivateFieldSet(this, _Profil_email, email, "f");
        __classPrivateFieldSet(this, _Profil_avatar, avatar, "f");
        __classPrivateFieldSet(this, _Profil_temps, temps, "f");
        __classPrivateFieldSet(this, _Profil_niveau, niveau, "f");
        __classPrivateFieldSet(this, _Profil_type, type, "f");
        __classPrivateFieldSet(this, _Profil_bio, bio, "f");
        __classPrivateFieldSet(this, _Profil_interets, interets, "f");
        __classPrivateFieldSet(this, _Profil_mode, mode, "f");
    }
    get pseudo() { return __classPrivateFieldGet(this, _Profil_pseudo, "f"); }
    get password() { return __classPrivateFieldGet(this, _Profil_password, "f"); }
    get email() { return __classPrivateFieldGet(this, _Profil_email, "f"); }
    get avatar() { return __classPrivateFieldGet(this, _Profil_avatar, "f"); }
    get temps() { return __classPrivateFieldGet(this, _Profil_temps, "f"); }
    get niveau() { return __classPrivateFieldGet(this, _Profil_niveau, "f"); }
    get type() { return __classPrivateFieldGet(this, _Profil_type, "f"); }
    get bio() { return __classPrivateFieldGet(this, _Profil_bio, "f"); }
    get interets() { return __classPrivateFieldGet(this, _Profil_interets, "f"); }
    get mode() { return __classPrivateFieldGet(this, _Profil_mode, "f"); }
    set password(password) { __classPrivateFieldSet(this, _Profil_password, password, "f"); }
    set email(email) { __classPrivateFieldSet(this, _Profil_email, email, "f"); }
    set avatar(avatar) { __classPrivateFieldSet(this, _Profil_avatar, avatar, "f"); }
    set temps(temps) { __classPrivateFieldSet(this, _Profil_temps, temps, "f"); }
    set niveau(niveau) { __classPrivateFieldSet(this, _Profil_niveau, niveau, "f"); }
    set type(type) { __classPrivateFieldSet(this, _Profil_type, type, "f"); }
    set bio(bio) { __classPrivateFieldSet(this, _Profil_bio, bio, "f"); }
    set interets(interets) { __classPrivateFieldSet(this, _Profil_interets, interets, "f"); }
    set mode(mode) { __classPrivateFieldSet(this, _Profil_mode, mode, "f"); }
}
_Profil_pseudo = new WeakMap(), _Profil_password = new WeakMap(), _Profil_email = new WeakMap(), _Profil_avatar = new WeakMap(), _Profil_temps = new WeakMap(), _Profil_niveau = new WeakMap(), _Profil_type = new WeakMap(), _Profil_bio = new WeakMap(), _Profil_interets = new WeakMap(), _Profil_mode = new WeakMap();
