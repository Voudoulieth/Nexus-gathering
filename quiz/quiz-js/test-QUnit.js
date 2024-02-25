// *************** Tests unitaires avec QUnit
// !!! Sous ce commentaire, il faut selectionner TOUT le code et le décommenter pour afficher les tests



// import { validerTitre } from "./creer-quiz-communautaire.js";

// const {test} = QUnit;

// QUnit.module('returnFalse');

// test("Test titre - Vide", function (assert) {
//     const message   = document.createElement("div"); // On simule la div où le message est censé apparaître en cas d'erreur
//     titreQuiz.value = ""; // Simulation de saisie vide dans l'input du titre

//     const resultat  = validerTitre(message);

//     assert.notOk(resultat, "Retourne false pour une saisie vide"); // la fonction renvoit false pour une saisie vide
//     assert.ok(message.innerHTML.includes("<br>ERREUR - Le titre n'est pas correct, merci d'entrer au moins 2 caractères et au plus 30. Vous avez le droit d'entrer des chiffres et de la ponctuation."), "Le message d'erreur est affiché"); // Si il est vrai qu'un tel texte est affiché dans la div du test, alors le message d'erreur pour "" fonctionne correctement
// });

// test("Test titre - Espaces", function (assert) { // on teste le caractère "espace" pour vérifier si .trim() fonctionne bien
//     const message   = document.createElement("div"); 
//     titreQuiz.value = "a"; 
//     const resultat  = validerTitre(message);
//     assert.notOk(resultat, "Retourne false pour une saisie d'espaces, transformés en chaine vide par .trim()"); 
//     assert.ok(message.innerHTML.includes("<br>ERREUR - Le titre n'est pas correct, merci d'entrer au moins 2 caractères et au plus 30. Vous avez le droit d'entrer des chiffres et de la ponctuation."), "Le message d'erreur est affiché");
// });

// test("Test titre - Moins de 2 caractères", function (assert) {
//     const message   = document.createElement("div"); 
//     titreQuiz.value = " "; 
//     const resultat  = validerTitre(message);
//     assert.notOk(resultat, "Retourne false pour une chaine trop courte < 2 caractères"); 
//     assert.ok(message.innerHTML.includes("<br>ERREUR - Le titre n'est pas correct, merci d'entrer au moins 2 caractères et au plus 30. Vous avez le droit d'entrer des chiffres et de la ponctuation."), "Le message d'erreur est affiché");
// });

// test("Test titre - Plus de 30 caractères", function (assert) {
//     const message   = document.createElement("div"); 
//     titreQuiz.value = "aaaaa".repeat(7); 
//     const resultat  = validerTitre(message);
//     assert.notOk(resultat, "Retourne false pour une chaine trop longue > 30 caractères"); 
//     assert.ok(message.innerHTML.includes("<br>ERREUR - Le titre n'est pas correct, merci d'entrer au moins 2 caractères et au plus 30. Vous avez le droit d'entrer des chiffres et de la ponctuation."), "Le message d'erreur est affiché");
// });

// test("Test titre - Caractères non autorisée", function (assert) {
//     const message   = document.createElement("div"); 
//     titreQuiz.value = "µ ¶ Ͽ"; 
//     const resultat  = validerTitre(message);
//     assert.notOk(resultat, "Retourne false si la saisie contient des caractères non autorisés"); 
//     assert.ok(message.innerHTML.includes("<br>ERREUR - Le titre n'est pas correct, merci d'entrer au moins 2 caractères et au plus 30. Vous avez le droit d'entrer des chiffres et de la ponctuation."), "Le message d'erreur est affiché");
// });


// QUnit.module('returnTrue');

// test("Test titre - Saisie classique, cas nominal", function (assert) {
//     const message   = document.createElement("div"); 
//     titreQuiz.value = "test"; 
//     const resultat  = validerTitre(message);
//     assert.ok(resultat, "Retourne true pour une saisie classique, cas nominal"); 
//     assert.notOk(message.innerHTML.includes("<br>ERREUR - Le titre n'est pas correct, merci d'entrer au moins 2 caractères et au plus 30. Vous avez le droit d'entrer des chiffres et de la ponctuation."), "Pas de message d'erreur");
// });

// test("Test titre - Saisie classique, cas nominal, plusieurs mots avec espaces", function (assert) {
//     const message   = document.createElement("div"); 
//     titreQuiz.value = "test avec espaces"; 
//     const resultat  = validerTitre(message);
//     assert.ok(resultat, "Retourne true pour une saisie classique avec des espaces, plusieurs mots"); 
//     assert.notOk(message.innerHTML.includes("<br>ERREUR - Le titre n'est pas correct, merci d'entrer au moins 2 caractères et au plus 30. Vous avez le droit d'entrer des chiffres et de la ponctuation."), "Pas de message d'erreur");
// });

// test("Test titre - Caractère spéciaux autorisés", function (assert) {
//     const message   = document.createElement("div"); 
//     titreQuiz.value = ".,;:'   !?()\s$€\-/*%°#~&"; 
//     const resultat  = validerTitre(message);
//     assert.ok(resultat, "Retourne true pour les caractères spéciaux autorisés dans l'expression régulière"); 
//     assert.notOk(message.innerHTML.includes("<br>ERREUR - Le titre n'est pas correct, merci d'entrer au moins 2 caractères et au plus 30. Vous avez le droit d'entrer des chiffres et de la ponctuation."), "Pas de message d'erreur");
// });

// test("Test titre - Chiffres", function (assert) {
//     const message   = document.createElement("div"); 
//     titreQuiz.value = "129320"; 
//     const resultat  = validerTitre(message);
//     assert.ok(resultat, "Retourne true pour les chiffres"); 
//     assert.notOk(message.innerHTML.includes("<br>ERREUR - Le titre n'est pas correct, merci d'entrer au moins 2 caractères et au plus 30. Vous avez le droit d'entrer des chiffres et de la ponctuation."), "Pas de message d'erreur");
// });